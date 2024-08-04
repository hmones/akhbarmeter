<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'slug' => 'required|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
            'description' => 'required',
            'image' => 'nullable|image|max:10000',
            'tags' => 'nullable',
            'type' => 'required|string',
            'author_name' => 'required',
            'author_avatar' => 'nullable|image|max:10000',
            'published_at' => 'nullable',
            'active' => 'required|in:0,1',
        ];
    }
}
