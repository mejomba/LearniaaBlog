<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Learner;

class User extends Authenticatable
{
    use Notifiable; 
    protected $primaryKey = 'pk_users';
    protected $table = 'users';
    protected $fillable = ['type', 'name', 'username','attract', 'extras' , 'password'];
    protected $hidden = [];
    protected $casts = [];

    public function profile()
    {
       return $this->hasOne(Profile::class,'pk_users','pk_users');
    }

    public function learner()
    {
       return $this->hasOne(Learner::class,'pk_user');
    }

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_users' => 'کلید کاربر ها',
                 'type' => 'نوع',
                 'name' => 'نام کاربر',
                 'mobile' => 'شماره موبایل',
                 'Wallet'=> 'موجودی',
                ] ;
    }
}
