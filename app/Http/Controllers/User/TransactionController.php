<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use Auth;

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
         /// compact $wallet to view 
    }

    /**
     *    انتقال به صفحه بانک و انجام افزایش موجودی
     */

    public function store(Request $request)
    {
                 
                 $invoice = (new Invoice)->amount( request()->amount);
                $responce =    Payment::purchase($invoice, function($driver, $transactionId)  { });
               
                    // Get information payment & Save Database
                  $transactionId = $invoice->getTransactionId();
                  $driver = $invoice->getDriver();

                  $user =  Auth::user() ;
          
                  $transaction = new Transaction();
                  $transaction->pk_users =  $user->pk_users ;
                  $transaction->price = request()->amount;
                  $transaction->digital_receipt = $transactionId ;
                  $transaction->date = now()->timestamp ;
                  $transaction->time = now()->timestamp ;
                  
                  $transaction->save();
          
                  return Payment::purchase($invoice, function($driver, $transactionId) {
                    // store transactionId in database, we need it to verify payment in future.
                })->pay();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
