<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'nullable',
            'tags' => 'nullable',
            'file' => 'required|file|max:8000',
            'author_name' => 'required',
            'author_avatar' => 'nullable|image|max:8000',
            'image' => 'nullable|image|max:8000',
            'min_to_read' => 'required|numeric',
        ];
    }
}
