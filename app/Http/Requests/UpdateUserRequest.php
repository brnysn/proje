<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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
                // 'unique:users,email,{$this->user->id}',
                Rule::unique('users')->ignore($this->user->id, 'id')
            ],
            'password' => [
                'nullable',
                'required_with:password_confirmation',
                'string',
                'confirmed'
            ],
            'current_password' => 'required',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // checks user current password before making changes
        $validator->after(function ($validator) {
            if ( !Hash::check($this->current_password, $this->user()->password) ) {
                $validator->errors()->add('current_password', 'Güncel şifrenizi kontrol ediniz.');
            }
        });
        return;
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
