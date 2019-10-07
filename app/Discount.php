<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $primaryKey = 'pk_discount';


    public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_discount' => 'کلید بن تخفیف',
                'serial' => 'سریال کد ',
                'owners'=> 'مالکین',
                'status' => 'وضعیت',
               
                ] ;
   }
}
