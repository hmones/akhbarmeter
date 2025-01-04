<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class MediaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'image' => 'required|image|max:10000',
        ];
    }
}
