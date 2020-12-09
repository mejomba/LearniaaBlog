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

    return  [   'pk_course' => 'کلید درس',
                'pk_package' => 'کلید پکیج',
                'pk_learner' => 'کلید مدرس',
                'name'=> 'عنوان درس',
                'sort'=> ' شماره قسمت',
            ] ;
    }

    public function GetListAllNameColumns_ForLearner()
    {

    return  [   'pk_course' => 'کلید درس',
                'name'=> 'عنوان درس',
                'sort'=> ' شماره قسمت',
                'download_count'=> ' تعداد دانلود',

            ] ;
    }
    public function package()
    {
     return $this->hasOne('App\Package', 'pk_package', 'pk_package');
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
