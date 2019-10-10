<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
   

    protected $table = 'categories';
    protected $primaryKey = 'pk_categories';







    public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_categories' => 'کلید دسته بندی',
                'name' => 'نام',
                'desc' => 'توضیحات',
                'type'=> 'نوع',
                ] ;
   }

   public function product()
   {

    return $this->hasMany('App\Product', 'pk_category', 'pk_categories');
   }






}

