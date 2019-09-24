<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /*
     public function __construct()
    {
        $this->middleware('auth');
    }
    */



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //  $posts = Post::get()->take(6);
      //  $caStegories = Category::get()->take(6);
     //   return view('index',compact('posts','categories'));

     return redirect(route('post.index'));
     
    }

    public function show_contactus()
    {
      return view('site.Contactus');
     
    }
    public function show_Abutus()
    {
      return view('site.Abutus');
    
    }

    public function show()
    {
      $prdoucts = array();

      return view('site.index',compact('prdoucts'));
    }

    public function paymentstart()
    {
                # create new invoice
        $invoice = (new Invoice)->amount(1000);
       // $invoice->transactionId = uniqid();


        
        # purchase and pay the given invoice
        // you should use return statement to redirect user to the bank's page.
      $responce =    Payment::purchase($invoice, function($driver, $transactionId) {
            // store transactionId in database, we need it to verify payment in future.
        });

        $transactionId = $invoice->getTransactionId();
        $driver = $invoice->getDriver();

        $transaction = new Transaction();
        $transaction->pk_users = 3 ;
        $transaction->price = 1000;
        $transaction->digital_receipt = $transactionId ;
        $transaction->date = now()->timestamp ;
        $transaction->time = now()->timestamp ;
        
        $transaction->save();

        return Payment::purchase($invoice, function($driver, $transactionId) {
          // store transactionId in database, we need it to verify payment in future.
      })->pay();


       

        
                


    }

    public function paymentcomplete()
    {
      try {

       $tran =  Transaction::where('pk_users','3' )->get()->first();
       
        Payment::amount(1000)->transactionId($tran->digital_receipt)->verify();
          
      }
       catch (InvalidPaymentException $exception)
        {
          
          dd($exception->getMessage());
      }
      
    }


}
