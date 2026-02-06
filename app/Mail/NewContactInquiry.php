<?php

namespace App\Mail;

use App\Models\ContactInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactInquiry $inquiry
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Liên hệ mới từ website',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-contact-inquiry',
        );
    }
}
