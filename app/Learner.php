<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

}
