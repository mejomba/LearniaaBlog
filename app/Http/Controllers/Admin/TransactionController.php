<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
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
        $transactions = Transaction::get();
        return view('admin.transaction.index',compact('transactions','names'));
    }

    /**
     *  جستجو در میان تراکنش های انجام شده از کاربرها
     */
    public function search()
    {
        //
    }

    
}
