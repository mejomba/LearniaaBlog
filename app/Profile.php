<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'pk_profiles';


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
                 'amount_time' => 'میزان زمان',
                 'pic' => 'تصویر',
                 'wallet' => 'کیف پول',
                 'complete' => 'وضعیت تکمیل',
                 ] ;
    }

}
