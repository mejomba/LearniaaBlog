<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'pk_product';


    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_product' => 'کلید محصول',
                'pk_category' => 'کلید دسته بندی ',
                'pk_tag' => 'کلید تگ  ',
                'pk_learner' => 'کلید مدرس',
                 'title' => 'زمان',
                 'pic' => 'تصویر ',
                 'price' => 'قیمت  ',
                 'time' => 'مدت زمان',
                 'desc' => 'توضیحات',
                 'count' => 'تعداد قسمت ها',
                 'language' => ' زبان دوره',
                 'subtitle' => 'زبان زیرنویس',
                 'status' => 'وضعیت',

                 ] ;
    }
    
}
