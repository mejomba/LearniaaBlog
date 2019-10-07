<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use App\Transaction;
use App\Profile;
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

                  if($invoice)
                  {   
                        return Payment::purchase($invoice, function($driver, $transactionId) 
                        {
                            // store transactionId in database, we need it to verify payment in future.
                            $user =  Auth::user() ;
                            $transaction = new Transaction();
                            $transaction->pk_users =  $user->pk_users ;
                            $transaction->price = request()->price;
                            $transaction->type = 'افزایش موجودی کیف پول';
                            $transaction->digital_receipt = $transactionId ;
                             // process extras --> save all option to array And save to $new_instance
                            $data_extras = array();
                            $data_extras["problem"] = 'عملیات موفق';
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
            
            // Finalize Success Payment From Bank //

                    
                    if($transaction->type == 'افزایش موجودی کیف پول')
                    {
                        // Update & Process Wallet Or Transaction  //
                        $profile = Profile::where('pk_users', $user->pk_users)->get()->first();
                        $profile->wallet =   (int) $profile->wallet + (int)$transaction->price ;
                        $profile->save();

                       // Redirect User To Target Page //
                        return redirect()->back()->with('success','عملیات بانکی با موفقیت انجام شد');      
                    }
                    
                    /* Add Another if to Type Transaction
                    if($transaction->type == '*******')
                    {
                    }
                    */
           }
            catch (InvalidPaymentException $exception)
             {
                $user =  Auth::user() ;    
                $transaction =  Transaction::where('pk_users', $user->pk_users )->orderBy('pk_transaction', 'DESC')->get()->first();

                 // process extras --> save all option to array And save to $new_instance
                    $data_extras = array();
                    $data_extras["problem"] =  $exception->getMessage();
                    $transaction->extras =  json_encode($data_extras,false) ;    
                    $transaction->save();
                        
                return redirect(route('user.transaction.create'))->with('report','خطا : مشکل در انجام عملیات بانکی');
              
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
}
