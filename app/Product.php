<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'pk_product';


    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'title' => 'زمان',
                 'pic' => 'تصویر ',
                 'price' => 'قیمت  ',
                 'time' => 'زمان',
                 'desc' => 'توضیحات',
                 'count' => 'تعداد قسمت ها',
                 'language' => ' زبان',
                 'subtitle' => 'زیرنویس',

                 ] ;
    }
    
}
