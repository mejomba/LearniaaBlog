<?php

namespace App;
use App\Learner;

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
                 'title' => 'عنوان محصول',
                 'pic' => 'تصویر ',
                 'price' => 'قیمت  ',
                 'time' => 'مدت زمان',
                 'count' => 'تعداد قسمت',
                 'language' => ' زبان دوره',
                 'subtitle' => 'زبان زیرنویس',
                 'status' => 'وضعیت',

                 ] ;
    }

    public function learner()
    {

     return $this->hasOne('App\Learner', 'pk_learner', 'pk_learner');
    }
    
}
