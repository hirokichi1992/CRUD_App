<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
    public function validateHello($attribute, $value, $parameters)
    {
        // 偶数なら許可、奇数なら不許可
        return $value % 2 == 0;
    }
}