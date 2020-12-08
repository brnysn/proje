<?php

namespace App\Http\Requests;

use App\Password;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class StorePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => [
                'title',
                'min:2'
            ],
            'username'    => [
                'required',
                'min:3'
            ],
            'pass' => [
                'required',
                'min:6',
                'without_spaces'
            ]
        ];
    }
    
    public function owner($request)
    {
        $request->request->add(['owner' => Auth::user()->id]);
        return $request;
    }
}
