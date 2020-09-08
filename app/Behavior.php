<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    protected $table = 'behaviors';
    protected $primaryKey = 'pk_behavior';

    public function user()
    {
       return $this->belongsTo(User::class,'pk_users','pk_users');
    }

    public function profile()
    {
       return $this->hasOne('App\Profile','pk_users','pk_users');
    }

    public function post()
    {
       return $this->hasOne(Post::class,'pk_posts');
    }

    
    public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_behavior' => 'کلید رفتار ',
                'type_entity' => 'نوع موجودیت',
                'pk_entity' => 'کلید موجودیت',
                'pk_users' => 'کلید کاربر',
                'type_behavior' => 'نوع رفتار',
                'content'=> 'محتوا',
                'reply'=> 'وضعیت پاسخ',
                ] ;
   }


}
