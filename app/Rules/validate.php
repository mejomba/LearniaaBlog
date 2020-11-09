<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Validator;

class validate implements Rule
{
    public function __construct(){}

    public function passes($attribute, $value)
    {
        $trim = trim($value);
        $len = strlen($trim);
        $check = substr($trim,'0','2');
        if ($check=='09'&&$len==11)
        {   $validator = Validator::make([$value],['numeric']);
            if ($validator->fails()) { return false; } else {return true;}  }
        if($check!='09')
        {
            $validator = Validator::make([$value],['email']);
             if ($validator->fails()){return false;}else{return true;} }    
            return false;
    }
    
    public function message()
    { return 'نام کاربری صحیح وارد نشده است';   
    }
}
