<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckNewsRequest;
use App\Mail\CheckNewsMail;
use Illuminate\Support\Facades\Mail;

class CheckNewsController extends Controller
{
    public function store(CheckNewsRequest $request): string
    {
        Mail::to(config('mail.from.address'))->send(new CheckNewsMail($request->safe()->url));

        return 'Thank you!';
    }
}
