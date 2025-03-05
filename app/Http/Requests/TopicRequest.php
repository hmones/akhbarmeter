<?php

namespace App\Http\Requests;

use App\Models\Topic;
use App\Rules\TopicSubTypeRule;
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
            'title'                     => 'required',
            'sub_title'                 => 'nullable',
            'slug'                      => 'required|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
            'description'               => 'required',
            'brief_description_summary' => 'nullable',
            'summary'                   => 'required',
            'image'                     => 'nullable|image|max:10000',
            'team_member_id'            => 'required|exists:team_members,id',
            'claim_reference'           => 'nullable',
            'fact_check_reference'      => 'nullable',
            'legal_statement'           => 'nullable',
            'published_at'              => 'required',
            'active'                    => 'required|in:0,1',
            'tags'                      => 'nullable|array|exists:tags,id',
            'new_tags'                  => 'nullable|string',
            'type' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!array_key_exists($value, Topic::TYPES)) {
                        $fail('Invalid type selected.');
                    }
                }
            ],
            'sub_type' => [
                'nullable',
                'string',
                new TopicSubTypeRule($this->input('type'))
            ]
        ];
    }
}
