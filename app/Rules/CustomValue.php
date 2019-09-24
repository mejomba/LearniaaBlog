<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomValue implements Rule
{
    public $val;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($new_val)
    {
        $this->val = $new_val;
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
        return $this->val === $value ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'مقدار وارد شده صحیح نمی باشد';
    }
}
