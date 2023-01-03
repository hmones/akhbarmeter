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
            'url.active_url' => '* The link has to be the full and accessible link to the article: e.g. https://edition.cnn.com/',
            'url.unique'     => 'articleExist',
            'url.required'   => '* The link has to be the full and accessible link to the article: e.g. https://edition.cnn.com/'
        ];
    }
}
