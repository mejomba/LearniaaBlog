<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'pk_users';
    protected $table = 'users';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'mobile', 'extras' , 'password'
    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];


    public function profile()
    {
       return $this->hasOne(Profile::class);
    }




    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_users' => 'کلید کاربر ها',
                 'type' => 'نوع',
                 'name' => 'نام کاربر',
                 'mobile' => 'شماره موبایل',
                 
                

                 ] ;
    }
}
