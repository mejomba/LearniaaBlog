<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'pk_tags';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_tags' => 'کلید تگ ها',
                 'fa_name' => 'نام فارسی',
                 'en_name' => 'نام انگلیسی',
                 'type' => 'نوع ',
            
                 ] ;
    }
}
