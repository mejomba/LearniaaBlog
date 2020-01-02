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
    /**
     * Create a new rule instance.
     *
     * @return void
     */

   
    public $type;


    public function __construct($type)
    {
     
        $this->type =  $type;
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

        $row =   Tag::where('fa_name',$value)->where('type',$this->type)->count();
     
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
        return 'تگ ایجاد شده تکراری می باشد';
    }
}
