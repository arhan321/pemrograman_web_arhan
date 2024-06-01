<?php

namespace App\Http\Requests;

use Gate;
use App\Models\Home;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('home_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
