<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   use HasApiTokens ; 

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







}

