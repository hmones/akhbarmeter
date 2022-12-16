<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Mail::to(config('mail.from.address'))->send(new ContactMail($request->safe()->toArray()));

        return redirect(route('contact.index'))
            ->with('success', 'Thank you for contacting us, we will get in touch with you shortly!');
    }
}
