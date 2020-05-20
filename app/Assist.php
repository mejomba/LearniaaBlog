<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    protected $table = 'assist';
    protected $primaryKey = 'pk_assist';

    public function user ()
    {
       return $this->belongsTo(User::class,'pk_users','pk_users');
    }

    public function post ()
    {
       return $this->hasOne(Post::class,'pk_posts');
    }

    
    public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_assist' => 'کلید همکاری ',
                'name' => 'کلید موجودیت',
                'lastname' => 'کلید کاربر',
                'coursename' => 'نوع',
                'expertise'=> 'محتوا',
                'phonenumber'=> 'وضعیت',

                ] ;
   }


}
