<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'pk_profiles';


    protected $fillable = [
      'pk_users', 'birthday', 'email', 'state' , 'area','address'
  ];


    public function user()
    {
       return $this->hasOne(User::class,'pk_users');
    }

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'birthday' => 'تاریخ تولد',
                 'first_name' => 'نام ',
                 'last_name' => 'نام خانوادگی',
                 'email' => 'ایمیل',
                 'state' => 'استان',
                 'area' => 'منطقه',
                 'address' => 'آدرس',

                 ] ;
    }

    

}
