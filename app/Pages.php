<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $table = 'pages';
    protected $primaryKey = 'pk_page';


    public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_pages' => 'کلید برگه',
                'id_pages' => 'آیدی برگه',
                'eng_name' => 'نام انگلیسی',
                'farsi_name' => 'نام فارسی',
                'data' => 'محتوا',

                ] ;
   }
}

