<?php

namespace App\Http\Requests;

use App\Http\Traits\validationHandler;
use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
{
    use validationHandler;

    public function authorize()
    {
        return true;
    }

    public function rules() :array
    {
        return [
            'email' => 'required'
        ];
    }

    public function attributes() :array
    {
        return [
            'email' => 'field is required'
        ];
    }
}
