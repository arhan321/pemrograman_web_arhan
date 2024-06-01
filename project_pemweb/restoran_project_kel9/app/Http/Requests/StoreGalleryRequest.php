<?php

namespace App\Http\Requests;

use Gate;
use App\Models\Gallery;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_create');
    }

    public function rules()
    {
        return [
            // 'title' => [
            //     'string',
            //     'required',
            // ],
            'image' => [
                'required',
            ],
        ];
    }
}
