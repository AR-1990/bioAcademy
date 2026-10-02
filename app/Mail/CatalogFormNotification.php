<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CatalogFormNotification extends Mailable
{
    use Queueable, SerializesModels;

    public array $leadDetails;

    public function __construct(array $leadDetails)
    {
        $this->leadDetails = $leadDetails;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Biopharma Academy | Catalog Form Lead',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.catalog_form',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
