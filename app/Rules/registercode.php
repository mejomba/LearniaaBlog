<?php

namespace App\Rules;
use App\Reset;
use Validator;

use Illuminate\Contracts\Validation\Rule;

class registercode implements Rule
{
    public $username;
    public function __construct($username){$this->username =  $username;}

    public function passes($attribute, $value)
    {
        $row = Reset::where(['pk_user'=>$this->username,'token'=>$value])->count();
        if($row != 0 ){return true;}
        return false;
    }

    public function message()
    { return 'کد وارد شده صحیح نمی باشد';}
}
