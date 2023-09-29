<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PublisherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'name'          => 'required',
            'slug'          => 'nullable|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
            'description'   => 'nullable',
            'url'           => 'required|url',
            'image'         => 'nullable|image|max:8000',
            'active'        => 'in:0,1',
            'hashtags'      => 'nullable',
            'title_xpath'   => 'nullable',
            'content_xpath' => 'nullable',
            'image_xpath'   => 'nullable',
            'author_xpath'  => 'nullable',
        ];
    }
}
