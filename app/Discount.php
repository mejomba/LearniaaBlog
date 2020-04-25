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
                'discount_code' => 'کد تخفیف ',
                'date_Expire' => 'تاریخ انقضای کد تخفیف',
                'minimum_buy' => 'حداقل مبلغ خرید',
                'limit' => 'محدودیت استفاده',
                'percent_discount' => 'درصد کد تخفیف',
                'maxdiscount' => 'سقف مبلغ کد تخفیف',
                'status' => 'وضعیت',

                
                ] ;
   }
}
