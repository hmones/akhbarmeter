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
            'article.author'        => 'nullable',
            'article.date'          => 'nullable|date',
            'review.comment'        => 'nullable',
            'review.user_id'        => 'exists:users,id',
            'review.article_id'     => 'exists:articles,id',
            'responses.*'           => 'required|array',
            'responses.*.option_id' => 'required|exists:question_options,id',
            'responses.*.comment'   => 'nullable',
            'responses.*.annotation' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'article.title.*'         => 'Article title is required',
            'article.image.*'         => 'Images has to be of filetype image and of size 7mb',
            'article.content.*'       => 'Article content is required',
            'review.user_id.*'        => 'The reviewer has to be a valid system user',
            'responses.*.option_id.*' => 'All questions need to have at least one answer selected',
        ];
    }
}
