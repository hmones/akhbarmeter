<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'lang' => 'required|in:ar,en',
        ];
    }
}
