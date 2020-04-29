<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'Orders';
    protected $primaryKey = 'pk_order';
}
