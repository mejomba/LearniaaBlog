<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'pk_tags';

    public function GetListAllNameColumns_ForTable()
    {
       return  [ 'question' => 'سوال نظرسنجی',
                 'option1' => 'گزینه1',
                 'option2' => 'گزینه2 ',
                 'option3' => 'گزینه3 ',
                 'option4' => 'گزینه4 ',

                 ] ;
    }
}
