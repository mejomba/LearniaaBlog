<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routing extends Model
{
    //

    protected $table = 'routing';
    protected $primaryKey = 'pk_routing';

   public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_routing' => 'کلید مسیریابی',
                'location_user_id' => 'آیدی مکان',
                'type_question' => 'نوع سوال',
              
                ] ;
   }

}
