<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'pk_package';


    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_package' => 'کلید محصول',
                 'pk_tree' => 'کلید درخت ',
                 'pk_category' => 'کلید دسته بندی  ',
                 'fa_name' => 'نام فارسی',
                 
                 'sort_tree' => 'شماره اولویت ',
                 'price' => 'قیمت  ',
                
                 'count' => 'تعداد قسمت',
                 'download_count' => 'تعداد دانلود',
                 'status' => 'وضعیت',
                 ] ;
    }
    public function GetListAllNameColumns_ForTableforuser()
    {
       return  [ 
                 'fa_name' => 'نام فارسی',
                 'en_name' => 'نام انگلیسی',

                 'price' => 'قیمت  ',
                 'count' => 'تعداد قسمت',
                 ] ;
    }


    public function GetListAllNameColumns_ForLearner()
    {
       return  [ 'pk_package' => 'کلید پکیج',
                 'fa_name' => 'نام پکیج',
                 'price' => 'قیمت پکیج',
                 'time'=> 'مدت پکیج',
                 'count' => 'تعداد قسمت',
                 'desc'=> 'توضیحات',
                 'download_count' => 'تعداد دانلود',

                 ] ;
    }
    public function learner()
    {
     return $this->hasOne('App\Learner', 'pk_learner', 'pk_learner');
    }

    public function tree()
    {
     return $this->hasOne('App\Tree', 'pk_tree', 'pk_tree');
    }

    
    
}
