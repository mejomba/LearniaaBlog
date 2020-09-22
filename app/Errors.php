<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Errors extends Model
{
    //
    protected $table = 'errors';
    protected $primaryKey = 'pk_error';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_error' => 'کلید اررور',
                 'user' => 'کلید کاربر',
                 'date' => 'تاریخ اررور',
                 'time' => 'زمان اررور',
                 'error_code' => 'کد اررور',
                 'error_message' => 'متن اررور',
                 'logname' => 'فایل لاگ اررور',
                 ] ;
    }
}
