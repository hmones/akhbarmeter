<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title'   => 'nullable',
            'date'    => 'nullable',
            'image'   => 'nullable|image|max:8000',
            'content' => 'nullable',
            'author'  => 'nullable|string',
            'comment' => 'nullable|string',
            'active'  => 'in:0,1',
            'is_fake' => 'in:0,1',
        ];
    }
}
