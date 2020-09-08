<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $primaryKey = 'pk_section';

   public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_section' => 'کلید سکشن',
                'pk_package' => 'کلید پکیج',
                'sort' => 'ترتیب',
                'name' => 'نام',
                'part_from' => 'شروع سکشن',
                'part_to' => 'انتهای سکشن',
                'intro' => 'ویدیو معرفی',
                ] ;
   }

   public function course($part_from,$part_to)
   {
    return $this->hasMany('App\Course', 'pk_package', 'pk_package')->whereBetween('sort', [$part_from, $part_to]);
   }
}
