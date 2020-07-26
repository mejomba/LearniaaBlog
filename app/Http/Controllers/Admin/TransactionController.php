<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Profile;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use Auth;
use Validator;

class TransactionController extends Controller
{
    /**
     *  مشاهدهی تمامی تراکنش های انجام شده توسط کاربر ها
     */
    public function index()
    {
        $instance_Model_transaction = new Transaction();
        $names =   $instance_Model_transaction->GetListAllNameColumns_ForTable();

        $user =  Auth::user() ;
        if($user->type == 'مدیر')
        {
            $transactions = Transaction::get();   
        }
        else
        {
            $transactions = Transaction::where('pk_users', $user->pk_users)->get();
        }
    
        return view('admin.transaction.index',compact('transactions','names'));
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
        return view('admin.transaction.create',compact('wallet'));
        
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

                  $url= route('admin.transaction.show');

                  if($invoice)
                  {   
                        return Payment::callbackUrl($url)->purchase($invoice, function($driver, $transactionId) 
                        {
                            // store transactionId in database, we need it to verify payment in future.
                            $user =  Auth::user() ;
                            $transaction = new Transaction();
                            $transaction->pk_users =  $user->pk_users ;
                            $transaction->price = request()->price;
                            $transaction->type = request()->type;
                            $transaction->digital_receipt = $transactionId ;
                             // process extras --> save all option to array And save to $new_instance
                            $data_extras = array();
                            $data_extras["problem"] = 'عملیات موفق';
                            
                            /// Diffrent Between Pay From Bank OR Wallet

                            if(request()->slug == null)
                            {
                                $transaction->pk_package = 0;
                            }
                            else
                            {
                                $transaction->pk_package = request()->slug ;
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

            $user =  Auth::user() ;    
            $transaction =  Transaction::where('pk_users', $user->pk_users )->orderBy('pk_transaction', 'DESC')->get()->first();
            Payment::amount( (int)$transaction->price)->transactionId($transaction->digital_receipt)->verify();
           

            $status_transaction =  $transaction::find( $transaction['pk_transaction']);
            $status_transaction->status = 'معتبر';
            $status_transaction->save();

            // Finalize Success Payment From Bank //

                    
                    if($transaction->type == 'افزایش موجودی کیف پول')
                    {
                        // Update & Process Wallet Or Transaction  //
                        $profile = Profile::where('pk_users', $user->pk_users)->get()->first();
                        $profile->wallet =   (int) $profile->wallet + (int)$transaction->price ;
                        $profile->save();

                       // Redirect User To Target Page //
                       return redirect()->route('admin.transaction.create')->with('success','عملیات بانکی با موفقیت انجام شد');      
                    }
                    
                    if($transaction->type == 'خرید دوره آموزشی')
                    {
                        return redirect()->route('package.detail',
                        ['slug' => $transaction->pk_package ])->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    
             
                    }
           }
            catch (InvalidPaymentException $exception)
             {
                $user =  Auth::user() ;    
                $transaction =  Transaction::where('pk_users', $user->pk_users )->orderBy('pk_transaction', 'DESC')->get()->first();

                 // process extras --> save all option to array And save to $new_instance
                 $transaction->status = 'نا معتبر';

                    $data_extras = array();
                    $data_extras["problem"] =  $exception->getMessage();
                    $transaction->extras =  json_encode($data_extras,false) ;    
                    $transaction->save();
                        
                if($transaction->type == 'افزایش موجودی کیف پول')
                    {  
                      return redirect(route('admin.transaction.create'))->with('report','خطا : مشکل در انجام عملیات بانکی');
                    }
                    if($transaction->type == 'خرید دوره آموزشی')
                    {
                        if($transaction->pk_package == 0)
                        {
                            return redirect()->route('package.index')->with('report','خطا : مشکل در انجام عملیات بانکی');    
                        }
                        else
                        {
                            return redirect()->route('package.detail',
                            ['slug' => $transaction->pk_package ])->with('report','خطا : مشکل در انجام عملیات بانکی');    
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




    public function packagelist()
    {

        $user =  Auth::user() ;

        $names = [ 
                    'شماره محصول' ,
                    'نام محصول',
                    'قیمت',
                    'مشاهده',
                ];

        if($user->type == 'مدیر')
        {
            $transactions =  Transaction::where('type', 'خرید دوره آموزشی' )->get();
        }
        else
        {
            $transactions =  Transaction::where('type', 'خرید دوره آموزشی' )->where('pk_users', $user->pk_users)->get();
        }

        return view('admin.transaction.packagelist',compact('names','transactions'));
    }

}
