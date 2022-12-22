<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title'       => 'required',
            'description' => 'nullable',
            'hint'        => 'nullable',
            'weight'      => Rule::in(Question::WEIGHTS),
            'label_id'    => 'nullable|exists:question_labels,id',
            'active'      => 'in:0,1',
        ];
    }

}
