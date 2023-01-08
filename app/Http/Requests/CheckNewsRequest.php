<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckNewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'required|active_url|unique:articles,url'
        ];
    }

    public function messages(): array
    {
        return [
            'url.active_url' => translate('pages.home.check.error'),
            'url.unique'     => 'articleExist',
            'url.required'   => translate('pages.home.check.error'),
        ];
    }
}
