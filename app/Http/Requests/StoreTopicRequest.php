<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'         => 'required',
            'description'   => 'required',
            'image'         => 'nullable|url',
            'tags'          => 'nullable|array',
            'type'          => 'required|string',
            'author_name'   => 'required',
            'author_avatar' => 'nullable|url'
        ];
    }
}
