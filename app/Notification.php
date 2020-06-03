<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'Notification';
    protected $primaryKey = 'pk_notification';


    protected $fillable = [
      'day', 'duration'
  ];


    public function user()
    {
       return $this->hasOne(User::class,'pk_users');
    }

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'day' => 'روز هفته ',
                 'duration' => 'بازه زمانی',
                 ] ;
    }

    

}
