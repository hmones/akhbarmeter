<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url'         => 'required|url',
            'title'       => 'required',
            'description' => 'nullable',
            'tags'        => 'nullable',
            'icon'        => 'nullable',
        ];
    }
}
