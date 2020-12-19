<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $table = 'log';
    protected $primaryKey = 'pk_log';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_log' => 'کلید لاگ',
                 'name' => 'نام کاربر',
                 'uuid' => ' آیدی کاربر ',
                 ] ;
    }
    public function columnnames()
    {
        return  [ 'pk_log' => 'کلید لاگ',
        'name' => 'نام کاربر',
        'uuid' => ' آیدی کاربر ',
        'location_user_id'=>'نام تابلو',
        'answer'=>'گزینه انتخاب شده',
        'sort'=>'شماره گام'
        ] ;

    }
}
