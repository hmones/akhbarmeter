<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'from' => 'nullable|date|before:to',
            'to'   => 'nullable|date|after:from'
        ];
    }

    public function messages(): array
    {
        return [
            'from.*' => 'From date should be a valid date before the "to" field',
            'to.*'   => 'To date should be a valid date after the "from" field'
        ];
    }
}
