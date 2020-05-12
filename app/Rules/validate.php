<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Validator;

class validate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function __construct()
    {
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
        $trim = trim($value);
        $len = strlen($trim);
        $check = substr($trim,'0','2');
        if ($check=='09'&&$len==11)
        {
            $validator = Validator::make([$value],['numeric']);

                    if ($validator->fails())
                {
                       return false;
                }else
                {
                    return true;
                }
        }
        if($check!='09')
        {

            $validator = Validator::make([$value],['email']);

                    if ($validator->fails())
                {
                        return false;
                }else
                {
                    return true;
                }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'نام کاربری صحیح وارد نشده است';
    }
}
