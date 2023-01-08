<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CheckNewsMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected string $url)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'A user just sent us a news article to check',
        );
    }

    public function content(): Content
    {
        return new Content(
            htmlString: 'Someone wants to check this news article for accuracy: <a href="'. $this->url .'">Link</a>',
        );
    }
}
