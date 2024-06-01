<?php

namespace App\Http\Requests;

use Gate;
use App\Models\About;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_create');
    }

    public function rules()
    {
        return [
            // 'description' => [
            //     'required',
            // ],
        ];
    }
}
