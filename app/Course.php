<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'courses';
    protected $primaryKey = 'pk_course';


    public function GetListAllNameColumns_ForTable()
    {
    return  [ 'pk_course' => 'کلید درس',
                'pk_tree' => 'درخت',
                'pk_product' => ' محصول',
                'sort'=> 'نوع',
                'name'=> 'نام',
                'description'=> 'توضیحات',

            ] ;
    }
}
