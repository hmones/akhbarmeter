<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data, public string $cvPath, public string $cvName)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->data['email'],
            to: config('mail.from.address'),
            subject: 'Job Apply Mail'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.job-apply',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path("app/" . $this->cvPath))
                ->as($this->cvName),
        ];
    }
}
