<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use App\Transaction;
use App\Profile;
use App\package;
use Auth;
use Validator;

class TransactionController extends Controller
{
    /*
      * مشاهده ی آموزش های خریداری شده هر کاربر
      */

      public function ShowPackagesList()
      {
          $package = new package();
          $names = $package->GetListAllNameColumns_ForTableforuser();
          //$packagelist;
          $pk_package = Transaction::select('pk_package')->where('pk_users',auth::user()->pk_users)->get();

                $packagelist = package::wherein('pk_package',$pk_package)->get();
                //dd($packagelist);
            
            
            return view('user.transaction.productlist',compact('packagelist','names'));

      }

    /*
     * مشاهده ی تراکنش های هر کاربر
    */

    public function index(Request $request)
    {
        /* Security Admin Panel */
        /* Security Admin Panel */        
        $instance_Model_transaction = new Transaction();
        $names =   $instance_Model_transaction->GetListAllNameColumns_ForTable();
        $user =  Auth::user() ;
        if($user->type == 'مدیر'){ $transactions = Transaction::get();   } 
        else {$transactions = Transaction::where('pk_users', $user->pk_users)->get();}
        return view('user.transaction.index',compact('transactions','names'));
    }

    public function AddWalletMoney(Request $request)
     {
        $validator =  $this->validation($request);
        if ($validator->fails())
        {  return redirect()->back()
                  ->withErrors($validator)
                  ->withInput();
        }
            else
            {         
                 $invoice = (new Invoice)->amount( (int) request()->price);
                  $driver = $invoice->getDriver();
                  $url= route('user.transaction.checkcallbackwalletmoney');

                  if($invoice)
                  {   
                        return Payment::callbackUrl($url)->purchase($invoice, function($driver, $transactionId) 
                        {
                            $user =  Auth::user() ;
                            $transaction = new Transaction();
                            $transaction->pk_users =  $user->pk_users ;
                            $transaction->price = request()->price;
                            $transaction->type = request()->type;
                            $transaction->digital_receipt = $transactionId ;
                            $data_extras = array();
                            $data_extras["problem"] = 'عملیات موفق';
                            $transaction->pk_package = 0;            
                            $transaction->status = 'در انتظار تایید';               
                            $transaction->extras =  json_encode($data_extras,false) ; 
                            $transaction->redirectFromURL = 'transaction/checkcallbackwalletmoney';
                            $verta = Verta::now();
                            $date =  $verta->year . '/' . $verta->month . '/' .    $verta->day ;
                            $transaction->date= $date;
                            $now = Carbon::now();
                            $transaction->time =$now->toDateString();
                            $transaction->save();
                        })->pay();
                    }
                    else
                    {
                        return redirect()->back()->with('report',' مشکل در انجام عملیات انتقال به بانک');
                    }
                }  
      }

    public function CheckCallBackWalletMoney()
    {
        try
         {
            $user =  Auth::user() ;    
            $transaction =  Transaction::where('pk_users', $user->pk_users )->orderBy('pk_transaction', 'DESC')->get()->first();
            Payment::amount( (int)$transaction->price)->transactionId($transaction->digital_receipt)->verify();
            $status_transaction =  $transaction::find( $transaction['pk_transaction']);
            $status_transaction->status = 'معتبر';
            $status_transaction->save();
            $profile = Profile::where('pk_users', $user->pk_users)->get()->first();
            $profile->wallet =   (int) $profile->wallet + (int)$transaction->price ;
            $profile->save();
           return redirect()->route('user.transaction.create')->with('success','عملیات بانکی با موفقیت انجام شد');      
          
       }
       catch (InvalidPaymentException $exception)
       {
          $user =  Auth::user() ;    
          $transaction =  Transaction::where('pk_users', $user->pk_users )->orderBy('pk_transaction', 'DESC')->get()->first();
          $transaction->status = 'نا معتبر';
          $data_extras = array();
          $data_extras["problem"] =  $exception->getMessage();
          $transaction->extras =  json_encode($data_extras,false) ;    
          $transaction->save();
          return redirect()->route('user.transaction.create')->with('report','مشکل در انجام عملیات انتقال به بانک');
  
       }
   }

   
    public function create()
    {
        /* Security Admin Panel */
        /* Security Admin Panel */        
        $user =  Auth::user() ;
        $profile = Profile::where('pk_users', $user->pk_users)->first();   
        $wallet = $profile->wallet;
        return view('user.transaction.create',compact('wallet'));  
    }
    public function ShowTransactions()
    {
        /*
        $instance_Model_transaction = new Transaction();
        $names =   $instance_Model_transaction->GetListAllNameColumns_ForTable();
        $user =  Auth::user() ;
        $transactions = Transaction::where('pk_users', $user->pk_users)->get();
        return view('user.transaction.index',compact('transactions','names'));
        */
    }

    /*
     * مشاهده ی کیف پول هر کاربر
    */

    public function OpenWalletMoney()
    {
        /*
        $user =  Auth::user() ;
        $profile = Profile::where('pk_users', $user->pk_users)->first();   
        $wallet = $profile->wallet;
        return view('user.transaction.create',compact('wallet'));
        */
    }

      public function validation(Request $request)
     {
        $rules =  [
                    'price' => 'required|numeric|min:500|max:10000000',  
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
