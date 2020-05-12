<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'Orders';
    protected $primaryKey = 'pk_order';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_order' => 'کلید سبد',
                 'pk_transaction' => 'شماره صورت حساب پرداختی',
                 'pk_Transportation' => 'شماره حمل و نقل گیرنده',
                 'pk_user'=> 'کلید کاربر',
                 'status_transaction'=> 'وضعیت پرداخت',
                 'Use_DiscountCode' => ' از کد تخفیف استفاده شد ؟',
                 'DiscountCode'=>'کد تخفیف استفاده شده',
                 'type_delivery'=>'نوع ارسال'
                 ] ;
    }
}
