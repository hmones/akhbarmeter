<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstName'  => 'required|string',
            'secondName' => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'nullable|numeric',
            'pageUrl'    => 'nullable|url',
            'subject'    => 'required|string',
            'message'    => 'required|string',
        ];
    }
}
