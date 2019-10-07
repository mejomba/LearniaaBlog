<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'pk_transaction';

    protected $fillable = [ 'pk_users', 'price', 'digital_receipt','created_at','updated_at']; 



    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_transaction' => 'کلید تراکنش',
                 'pk_users' => 'کلید کاربر',
                 'digital_receipt' => 'کد پیگیری ( رسید دیجیتال )',
                 'price' => 'قیمت',
                 'type' => 'نوع تراکنش',
                 'created_at' => 'زمان و تاریخ ثبت',
                 'updated_at' => 'زمان و تاریخ اصلاحیه',
                 'extras' => 'توضیحات',

                 ] ;
    }
}
