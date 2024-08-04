<?php

namespace App\Http\Requests;

use App\Models\QuestionOption;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'question_id' => 'nullable|exists:questions,id',
            'title' => 'required',
            'description' => 'nullable',
            'weight' => Rule::in(QuestionOption::WEIGHTS),
            'selected' => 'in:0,1',
        ];
    }
}
