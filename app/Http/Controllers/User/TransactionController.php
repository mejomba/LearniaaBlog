<?php

namespace App\Http\Controllers\User;

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
    /*
      * مشاهده ی آموزش های خریداری شده هر کاربر
      */

      public function ShowPackagesList()
      {
          
      }

    /*
     * مشاهده ی تراکنش های هر کاربر
    */

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
