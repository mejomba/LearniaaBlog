<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Package;
class Learner extends Model
{
    protected $table = 'learners';
    protected $primaryKey = 'pk_learner';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_learner' => 'کلید مدرس',
                 'pk_user' => 'کلید کاربر',
                 'pk_profile' => 'کلید پروفایل',
                 'pic'=> 'عکس',
                 'desc'=> 'توضیحات',
                 ] ;
    }

    


    public function user()
    {
     return $this->hasOne('App\User', 'pk_users', 'pk_user');
    }

    public function package()
    {
     return $this->hasmany('App\Package', 'pk_package');
    }


}
