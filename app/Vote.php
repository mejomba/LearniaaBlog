<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $primaryKey = 'pk_vote';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'pk_vote' => 'کلید نظرسنجی',
                 'name' => 'نام نظرسنجی ',
                 'question' => 'سوال نظرسنجی ',
                 'extras' => 'گزینه ها',
            
                 ] ;
    }
    public function GetListAllNameColumns_ForTableforuser()
    {
       return  [
                 'name' => 'نام نظرسنجی ',
                 'question' => 'سوال نظرسنجی ',
                 
            
                 ] ;
    }
}
