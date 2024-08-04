<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'nullable',
            'description' => 'nullable',
            'icon' => 'nullable',
        ];
    }
}
