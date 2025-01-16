<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'sub_title'   => 'required|string|max:255',
            'type'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'description' => 'required|string',
            'status'      => 'required|in:active,inactive'
        ];
    }
}
