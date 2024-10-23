<?php
namespace App\Http\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait validationHandler {
    public function failedValidation(Validator $validator)
    {
        $items = [];
        $errors = $validator->errors()->toArray();

        foreach($errors as $index => $error){
            $items[] = [
                'field'   => $index,
                'message' => $error[0],
            ];
        }

        $responseData = [
            'code'      => 403,
            'errors'    => $items
        ];
        throw new HttpResponseException(response()->json($responseData, 424));
    }
}
