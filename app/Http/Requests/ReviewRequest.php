<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'article.title'         => 'required',
            'article.image'         => 'sometimes|image|max:8000',
            'article.content'       => 'required',
            'review.comment'        => 'nullable',
            'review.user_id'        => 'exists:users,id',
            'review.article_id'     => 'exists:articles,id',
            'responses.*'           => 'required|array',
            'responses.*.option_id' => 'required|exists:question_options,id',
            'responses.*.comment'   => 'nullable',
            'responses.*.annotation' => 'nullable'
        ];
    }
}
