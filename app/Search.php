<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Search extends Model
{
    protected $table = 'search';
    protected $primaryKey = 'pk_row';

    public function tag()
    {
     return $this->hasOne('App\Tag', 'pk_tags', 'pk_tag');
    }
}
