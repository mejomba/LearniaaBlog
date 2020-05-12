<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use App\Transaction;
use App\Profile;
use App\Product;
use Auth;
use Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instance_Model_transaction = new Transaction();
        $names =   $instance_Model_transaction->GetListAllNameColumns_ForTable();
        $user =  Auth::user() ;
        $transactions = Transaction::where('pk_users', $user->pk_users)->get();
        return view('user.transaction.index',compact('transactions','names'));
    }

    /**
     * 
     *  انتقال به صفحه افزایش موجودی
     *
     */
    public function create()
    {
        $user =  Auth::user() ;
        $profile = Profile::where('pk_users', $user->pk_users)->first();   
        $wallet = $profile->wallet;
        return view('user.transaction.create',compact('wallet'));
        
    }

    /**
     *    ثبت درخواست افزایش موجودی و انتقال به صفحه بانک 
     */

    public function store(Request $request)
    {
        $validator =  $this->validation($request);

        if ($validator->fails())
        {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
    
        else
        {         
                 $invoice = (new Invoice)->amount( (int) request()->price);
                 // Get information payment & Save Database
                  $driver = $invoice->getDriver();
                  
                  $url= route('transaction.show');

                  if($invoice)
                  {   
                        return Payment::callbackUrl($url)->purchase($invoice, function($driver, $transactionId) 
                        {
                            // store transactionId in database, we need it to verify payment in future.
                            $transaction = new Transaction();

                            if(Auth::check())
                            {
                                $user =  Auth::user() ;
                                $transaction->pk_users =  $user->pk_users ;
                            }
                            else
                            {
                                $transaction->pk_users =  0 ;
                            }
                           
                            $transaction->price = request()->price;
                            $transaction->type = request()->type;
                            $transaction->digital_receipt = $transactionId ;
                             // process extras --> save all option to array And save to $new_instance
                            $data_extras = array();
                            $data_extras["problem"] = 'عملیات موفق';
                            
                            /// Diffrent Between Pay From Bank OR Wallet

                            if(request()->slug == null)
                            {
                                $transaction->pk_product = 0;
                            }
                            else
                            {
                                $transaction->pk_product = request()->slug ;
                            }

                            $transaction->status = 'در انتظار تایید';

                            $transaction->extras =  json_encode($data_extras,false) ; 

                            $transaction->save();
                        
                        })->pay();
                  }
                  else
                  {
                      return redirect()->back()->with('report','خطا : مشکل در انجام عملیات انتقال به بانک');
                  }

              }
          
    }

    
    public function show()
    {
        try {

            $transaction = "";

            if(Auth::check())
            {
                $user =  Auth::user() ;    
                $transaction =  Transaction::where('pk_users', $user->pk_users )->orderBy('pk_transaction', 'DESC')->get()->first();
                
            }
            else
            {
                $transaction =  Transaction::where('digital_receipt', $_GET['Authority'] )->get()->first();
               
            }

           Payment::amount( (int)$transaction->price)->transactionId($transaction->digital_receipt)->verify();

           $status_transaction =  $transaction::find( $transaction['pk_transaction']);
           $status_transaction->status = 'عملیات موفق';
           $status_transaction->save();
           
            // Finalize Success Payment From Bank //

                    
                    if($transaction->type == 'افزایش موجودی کیف پول')
                    {
                        // Update & Process Wallet Or Transaction  //
                        $profile = Profile::where('pk_users', $user->pk_users)->get()->first();
                        $profile->wallet =   (int) $profile->wallet + (int)$transaction->price ;
                        $profile->save();

                       // Redirect User To Target Page //
                        return redirect()->route('user.transaction.create')->with('success','عملیات بانکی با موفقیت انجام شد');      
                    }
                    
                    
                    if($transaction->type == 'خرید دوره آموزشی')
                    {
                        if(Auth::check())
                        {
                            $BeginnerTree = Product::where('title','پکیج کامل آموزش کامپیوتر')->first();
                            $pkProduct_BeginnerTree =  $BeginnerTree['pk_product'];
                            if( $pkProduct_BeginnerTree === $transaction->pk_product )
                            {
                                return redirect()->route('academy.detail')->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    
                            }
                            else
                            {
                                $product = Product::find($transaction->pk_product);
                                return redirect()->route('product.detail',
                                ['slug' => $transaction->pk_product , 'desc' =>  $product['title'] ])->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    
        
                            }
                           
                        }
                        else
                        {
                            /*
                            return redirect()->route('reset.callbacklogin',
                            ['slug' => $transaction->pk_product ,
                             'desc' =>  $product['title'] ,
                             'LocationUser' => 'BankPayment' ])->with('success','برای مشاهده و دریافت دوره آموزشی  فرم ثبت نام را تکمیل نمایید');    
                            */
                            $product = Product::find($transaction->pk_product);

                             return redirect()->route('transaction.callback',
                             ['pk_product' => $transaction->pk_product ,
                              'title' =>  $product['title'] ,
                              'LocationUser' => 'BankPayment', 
                              'digital_receipt'=> $_GET['Authority'] ]);    
                     

                        }



                    }
                    
           }
            catch (InvalidPaymentException $exception)
             {
                $transaction = "";
                 if(Auth::check())
                 {
                    $user =  Auth::user() ;    
                    $transaction =  Transaction::where('pk_users', $user->pk_users )->orderBy('pk_transaction', 'DESC')->get()->first();    
                 }
                 else
                 {
                    $transaction =  Transaction::where('digital_receipt', $_GET['Authority'] )->get()->first();
                }
                 // process extras --> save all option to array And save to $new_instance
                 $transaction->status = 'نا معتبر';
                 
                 $data_extras = array();
                    $data_extras["problem"] =  $exception->getMessage();
                    $transaction->extras =  json_encode($data_extras,false) ;    
                    $transaction->save();

                    if($transaction->type == 'افزایش موجودی کیف پول')
                    {  
                      return redirect(route('user.transaction.create'))->with('report','خطا : مشکل در انجام عملیات بانکی');
                    }
                    if($transaction->type == 'خرید دوره آموزشی')
                    {
                        if($transaction->pk_product == 0)
                        {
                            return redirect()->route('product.index')->with('report','خطا : مشکل در انجام عملیات بانکی');    
                        }
                        else
                        {
                            $BeginnerTree = Product::where('title','پکیج کامل آموزش کامپیوتر')->first();
                            $pkProduct_BeginnerTree =  $BeginnerTree['pk_product'];
                            if( $pkProduct_BeginnerTree === $transaction->pk_product )
                            {
                                return redirect()->route('academy.detail')->with('report','خطا : مشکل در انجام عملیات بانکی');    
                            }
                            else
                            {
                                $product = Product::find($transaction->pk_product);
                                return redirect()->route('product.detail',
                                ['slug' => $transaction->pk_product , 'desc' =>  $product['title'] ])->with('report','خطا : مشکل در انجام عملیات بانکی');    
                             }    
                        }
                    }

           }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function callback(Request $request)
    {
         
       return redirect(route('transaction.showcallbackform',
       ['pk_product' => request()->pk_product ,
        'title' =>  request()->title ,
        'digital_receipt'=>  request()->digital_receipt
        ]))->with('success','برای مشاهده و دریافت دوره آموزشی  تلفن همراه را وارد نمایید');    

      
    }

    public function showcallbackform(Request $request)
    {
       // $pk_product =  request()->pk_product ;
       // $title =  request()->title ;
      //  $digital_receipt = request()->digital_receipt ;
     //   return view('auth.callbackpayment',compact('pk_product','title','digital_receipt'));
        return view('auth.callbackpayment');
    }

    


    public function validation(Request $request)
    {

        $rules =  [
                    'price' => 'required|numeric|min:500|max:1000000',  
                   
               
                 ];

    $messages = [
                'price.required' => 'مبلغ  وارد نشده است',
                'price.numeric' => 'مبلغ  صحیح وارد نشده است',
                'price.min' => 'مبلغ کمتر از میزان مجاز وارد شده است',
                'price.max' => 'مبلغ بیشتر از میزان مجاز وارد شده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }




    public function productlist()
    {
        $user =  Auth::user() ;

        $names = [ 
            'شماره محصول' ,
            'نام محصول',
            'قیمت',
            'مشاهده',
        ];
        
        $transactions =  Transaction::where('type', 'خرید دوره آموزشی' )->where('pk_users', $user->pk_users)->get();

        return view('user.transaction.productlist',compact('names','transactions'));
    }
}
