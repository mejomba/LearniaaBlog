<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'pk_profiles';


    protected $fillable = [
      'pk_users', 'birthday', 'email', 'state' ,'address','job','favourite','amounttime','area'
  ];


    public function user()
    {
       return $this->hasOne(User::class,'pk_users');
    }

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'birthday' => 'تاریخ تولد',
                 'email' => 'ایمیل',
                 'state' => 'استان',
                 'address' => 'آدرس',
                 'job' => 'شغل',
                 'favourite' => 'علاقه',
                 'amounttime' => 'میزان زمان',
                 'area' => 'منطقه',
                 ] ;
    }

    

}
