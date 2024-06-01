<?php

namespace App\Http\Requests;

use Gate;
use App\Models\Why;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreWhyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('why_create');
    }

    public function rules()
    {
        return [
            // 'title' => [
            //     'string',
            //     'required',
            // ],
            // 'image' => [
            //     'required',
            // ],
        ];
    }
}
