<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'pk_transaction';

    protected $fillable = [ 'pk_users', 'price', 'digital_receipt','created_at','updated_at']; 
}
