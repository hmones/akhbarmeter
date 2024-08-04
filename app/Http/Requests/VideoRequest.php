<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'url' => 'required|url',
            'title' => 'required',
            'description' => 'nullable',
            'tags' => 'nullable',
            'icon' => 'nullable',
        ];
    }
}
