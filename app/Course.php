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
                'sort'=> 'ترتیب',
                'name'=> 'نام',
                'description'=> 'توضیحات',

            ] ;
    }
    public function product()
    {

     return $this->hasOne('App\Product', 'pk_product', 'pk_product');
    }
    public function tree()
    {

     return $this->hasOne('App\Tree', 'pk_tree', 'pk_tree');
    }

}
