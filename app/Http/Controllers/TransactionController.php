<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use App\Transaction;
use App\Profile;
use App\Package;
use App\Course;
use Auth;
use Verta;
use Validator;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     *    ثبت تراکنش مالی و ارجاع به دروازه پرداخت برای مشتری
     */

   
 public function store(Request $request)
 {
        $validator =  $this->validation($request);
        if ($validator->fails())
        {   return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }                                  
         else
         {       
                $user =  Auth::user() ;
                $profile = Profile::where('pk_users', $user->pk_users)->first();   
                 $wallet = $profile->wallet;
                if( (int) $wallet >= (int) request()->price)
                {
                    $transaction = new Transaction();
                    $transaction->pk_users =  $user->pk_users ;
                    $transaction->pk_package = request()->pk_package;
                    $transaction->digital_receipt = uniqid() ;
                    $transaction->price = request()->price;
                    $transaction->type = request()->type;
                    $transaction->status = 'عملیات موفق';
                    $transaction->redirectFromURL = request()->redirectFromURL;
                    $verta = Verta::now();
                    $date =  $verta->year . '/' . $verta->month . '/' .    $verta->day ;
                    $transaction->date= $date;
                    $now = Carbon::now();
                    $transaction->time =$now->toDateString();
                    $transaction->save(); 
                    $package = Package::find(request()->pk_package);
                    $package->download_count = $package->download_count + 1 ;
                    $package->save();
                    return redirect($transaction['redirectFromURL'])->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید'); 
                }   
                else
                {
                    $invoice = (new Invoice)->amount( (int) request()->price);
                    $driver = $invoice->getDriver();
                    $url= route('transaction.show');
                    if($invoice)
                    {   
                            return Payment::callbackUrl($url)->purchase($invoice, function($driver, $transactionId) 
                            {
                                $transaction = new Transaction();
                                $user =  Auth::user() ;
                                $transaction->pk_users =  $user->pk_users ;
                                $transaction->pk_package = request()->pk_package;
                                $transaction->digital_receipt = $transactionId ;
                                $transaction->price = request()->price;
                                $transaction->type = request()->type;
                                $transaction->status = 'در انتظار تایید';
                                $transaction->redirectFromURL = request()->redirectFromURL;
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
                        return redirect()->back()->with('report','خطا : مشکل در انجام عملیات انتقال به بانک');
                    }
                }
        }
 }

    /*
    * بررسی صحت تراکنش و پرداخت توسط مشتری و ارجاع به صفحه مربوطه
    */

    public function show()
    {
       try{
           $transaction = "";
           $user =  Auth::user() ;    
           $transaction =  Transaction::where('digital_receipt', $_GET['Authority'] )->get()->first();
           Payment::amount( (int)$transaction->price)->transactionId($transaction->digital_receipt)->verify();
           $status_transaction =  $transaction::find( $transaction['pk_transaction']);
           $status_transaction->status = 'عملیات موفق';
           $status_transaction->save();                    
           return redirect($transaction['redirectFromURL'])->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');              
        }

            catch (InvalidPaymentException $exception)
             {
                $transaction = "";
                $user =  Auth::user() ;     
                $transaction =  Transaction::where('digital_receipt', $_GET['Authority'] )->get()->first();
                $transaction->status = 'نا معتبر';
                $data_extras = array();
                $data_extras["problem"] =  $exception->getMessage();
                $transaction->extras =  json_encode($data_extras,false) ;    
                $transaction->save();
                return redirect($transaction['redirectFromURL'])->with('report','  مشکل در انجام عملیات بانکی');  
            } 
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
