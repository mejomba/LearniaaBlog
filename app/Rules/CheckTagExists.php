<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Validator;
use Auth;

class CheckTagExists implements Rule
{
    public $type;
    public function __construct($type){$this->type =  $type;}
    public function passes($attribute, $value)
    {
        $row =   Tag::where('fa_name',$value)->where('type',$this->type)->count();
        if($row != 0 ){return FALSE;}
        return TRUE;
    }
    public function message(){return 'تگ ایجاد شده تکراری می باشد';}
}
