<?php

namespace App\Http\Requests;

use Gate;
use App\Models\Footer;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreFooterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('footer_create');
    }

    public function rules()
    {
        return [
            'detail' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'faximile' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
           
        ];
    }
}
