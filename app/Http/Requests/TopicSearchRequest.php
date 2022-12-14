<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tag' => 'sometimes|string'
        ];
    }
}
