<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data)
    {
        //
    }

    public function build(): Mailable
    {
        return $this->subject(data_get($this->data, 'subject'))
            ->view('mail.contact', ['data' => $this->data]);
    }
}
