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
            'tags' => 'nullable',
            'type' => 'required|string',
            'team_member_id' => 'required|exists:team_members,id',
            'published_at' => 'nullable',
            'active' => 'required|in:0,1',
        ];
    }
}
