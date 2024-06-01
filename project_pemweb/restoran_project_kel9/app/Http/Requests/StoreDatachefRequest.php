<?php

namespace App\Http\Requests;

use Gate;
use App\Models\Datachef;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreDatachefRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('datachef_create');
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
