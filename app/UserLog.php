<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    //
    protected $table = 'userlog';
    protected $primaryKey = 'pk_userlog';

   public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_userlog' => 'کلید لاگ کاربر',
                'pk_user' => 'کلید کاربر',
                'url' => 'آدرس دیده شده',
                'date' => 'تاریخ',
                'time' => 'کلید ساعت',
                
                
                ] ;
   }
}
