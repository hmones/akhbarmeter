<?php

namespace App\Http\Requests;

use App\Models\PublisherScore;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PublisherScoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'from' => 'required|date',
            'period' => [
                'required',
                Rule::in(PublisherScore::PERIOD_WEEK, PublisherScore::PERIOD_MONTH, PublisherScore::PERIOD_YEAR),
            ],
        ];
    }
}
