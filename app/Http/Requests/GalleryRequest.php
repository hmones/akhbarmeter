<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'published_date' => 'required|date|date_format:Y-m-d',
            'images' => 'required|array|min:1',
            'images.*.image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
