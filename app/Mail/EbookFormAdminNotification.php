<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EbookFormAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public array $leadDetails;

    public function __construct(array $leadDetails)
    {
        $this->leadDetails = $leadDetails;
    }

    public function build()
    {
        $formType = $this->leadDetails['form_type'] ?? 'Ebook Download';
        return $this
            ->subject('Biopharma Academy | New ' . $formType . ' Lead')
            ->view('emails.ebook_form_admin')
            ->with(['leadDetails' => $this->leadDetails]);
    }
}
