<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPackage extends Model
{
    protected $table = 'orderpackages';
    protected $primaryKey = 'pk_orderpackage';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_order' => 'کلید سبد',
                 'pk_orderpackage' => 'شماره ایتم های سفارش',
                 'pk_prdocut ' => 'شماره محصول',
                 'price '=> 'مبلغ پرداختی محصول',
                 'count '=> 'تعداد محصول درخواستی',
                 'Total_price '=>'جمع مبلغ پرداحتی',
            ] ;
    }
}
