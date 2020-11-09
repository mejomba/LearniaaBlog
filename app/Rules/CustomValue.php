<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomValue implements Rule
{
    public $val;
    public function __construct($new_val){ $this->val = $new_val;  }
    public function passes($attribute, $value) {return $this->val === $value ;}
    public function message(){return 'مقدار وارد شده صحیح نمی باشد';}  
}
