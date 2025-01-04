<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|min:1|max:255',
            'last_name'  => 'required|min:1|max:255',
            'job_title'  => 'required|min:1|max:255',
            'bio'        => 'required',
            'image'      => 'required|image|max:10000',
            'linked_in'  => 'nullable|url|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.*$/',
            'email'      => 'nullable|email'
        ];
    }
}
