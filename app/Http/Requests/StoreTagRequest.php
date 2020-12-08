<?php

namespace App\Http\Requests;

use App\Tag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class StoreTagRequest extends FormRequest
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
    
    public function owner($request)
    {
        $request->request->add(['owner' => Auth::user()->id]);
        return $request;
    }
}
