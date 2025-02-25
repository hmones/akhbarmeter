<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstName'  => 'required|string',
            'secondName' => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'nullable|numeric',
            'jobTitle'   => 'required|string',
            'uploadCv'   => 'required|file|mimes:pdf,doc,docx|max:10048',
            'message'    => 'required|string'
        ];
    }
}
