<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    protected $table = 'tree';
    protected $primaryKey = 'pk_tree';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_tree' => 'کلید گره ها',
                 'pk_parent' => 'کلید گره پدر',
                 'level' => 'سطح عمق',
                 'sort' => 'ترتیب ',
                 'has_children' => 'دارای فرزند ',
                 'name' => 'نام گره ',  
                 ] ;
    }

    public function product()
    {

     return $this->hasOne('App\Product', 'pk_product', 'pk_AllCourse_product');
    }

    public function course()
    {

     return $this->hasOne('App\Course', 'pk_tree', 'pk_tree');
    }

}
