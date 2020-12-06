<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportVote extends Model
{
    protected $table = 'reportvotes';
    protected $primaryKey = 'pk_reportvote ';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_reportvote' => 'کلید نظرسنجی',
                 'name_vote' => 'نام نظرسنجی  ',
                 'pk_user' => ' کلید کاربر',
                 'answer' => ' [پاسخ]',


            
                 ] ;
    }

}
