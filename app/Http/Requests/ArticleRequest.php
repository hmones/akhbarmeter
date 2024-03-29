<?php

namespace App\Http\Requests;

use App\Rules\PublisherUrlRule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'url' => ['bail', 'required', 'url', new PublisherUrlRule()],
        ];
    }
}
