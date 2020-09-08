<?php

namespace App\Rules;
use App\reset;
use Validator;

use Illuminate\Contracts\Validation\Rule;

class registercode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $username;
    public function __construct($username)
    {
        //
        $this->username =  $username;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $row = reset::where(['pk_user'=>$this->username , 'token'=>$value])->count();
        if($row != 0 )
        {
           return FALSE;
        }
        return TRUE;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'کد وارد شده صحیح نمی باشد';
    }
}
