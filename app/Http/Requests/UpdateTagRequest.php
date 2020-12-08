<?php

namespace App\Http\Requests;

use App\Tag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class UpdateTagRequest extends FormRequest
{
    public function authorize()
    {

        return true;
    }

    public function rules()
    {
        return [
            'name'     => [
                'required',
                'unique:tags,deleted_at,NULL',
                'min:2'
            ]
        ];
    }
}
