<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'Notification';
    protected $primaryKey = 'pk_notification';


    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_notification' => 'کلید اطلاع رسانی ',
                 'pk_profile' => 'کلید پروفایل کاربر',
                 'day' => 'روز هفته',
                 'time' => 'زمان',
                 ] ;
    }

    

}
