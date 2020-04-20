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
                'codetakhfif' => 'کد تخفیف ',
                'Engheza' => 'تاریخ انقضای کد تخفیف',
                'minimom' => 'حداقل مبلغ خرید',
                'persent' => 'درصد کد تخفیف',
                'maxpersent' => 'سقف مبلغ کد تخفیف',

                ] ;
   }
}
