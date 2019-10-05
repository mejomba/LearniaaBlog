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
       return  [ 'time' => 'زمان',
                 'date' => 'تاریخ ',
                 'digital_receipt' => 'رسید دیجیتال ',
                 'price' => 'قیمت',
                 'type' => 'نوع',
                 'created_at' => 'ساخته شده در',
                 'updated_at' => 'ویرایش شده در',

                 ] ;
    }
}
