<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $table = 'history';
    protected $primaryKey = 'pk_history';


    public function GetListAllNameColumns_ForTable()
    {

    return  [ 'history' => 'کلید تاریخچه',
              'pk_users' => ' کلید کاربر',
              'pk_profile' => 'کلید پروفایل',
              'pk_tree' => 'کلید درخت',
              'description' => 'توضیح',
            ] ;
    }
}
