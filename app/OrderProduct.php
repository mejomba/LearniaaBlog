<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $table = 'orderproducts';
    protected $primaryKey = 'pk_orderproduct';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_order' => 'کلید سبد',
                 'pk_orderProduct' => 'شماره ایتم های سفارش',
                 'pk_prdocut ' => 'شماره محصول',
                 'price '=> 'مبلغ پرداختی محصول',
                 'count '=> 'تعداد محصول درخواستی',
                 'Total_price '=>'جمع مبلغ پرداحتی',
            ] ;
    }
}
