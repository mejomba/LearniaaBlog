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

    public function post()
    {
       return $this->hasOne(Post::class,'pk_posts');
    }

    
    public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_behavior' => 'کلید رفتار ',
                'pk_entity' => 'کلید موجودیت',
                'pk_users' => 'کلید کاربر',
                'type' => 'نوع',
                'content'=> 'محتوا',
                'status'=> 'وضعیت',

                ] ;
   }


}
