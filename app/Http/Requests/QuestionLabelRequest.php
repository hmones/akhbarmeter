<?php

namespace App\Http\Requests;

use App\Models\QuestionLabel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionLabelRequest extends FormRequest
{
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'icon' => 'required',
            'color' => ['required', Rule::in(array_keys(QuestionLabel::COLORS))],
            'priority' => 'required|numeric',
        ];
    }
}
