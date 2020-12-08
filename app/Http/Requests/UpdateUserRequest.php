<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    
    public function authorize()
    {

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'required',
            ],
            'email'   => [
                'required',
                'email',
            ],
            'password' => [
                'nullable',
                'string',
            ],
            'password_confirmation' => [
                'required_with:password',
            ]

        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'name' => 'trim|escape',
            'email' => 'trim|lowercase',
        ];
    }
}
