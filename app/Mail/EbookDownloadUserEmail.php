<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class EbookDownloadUserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public string $pdfPath;

    public function __construct(array $data, string $pdfPath)
    {
        $this->data = $data;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        $formType = $this->data['form_type'] ?? 'Ebook';
        $email = $this
            ->subject('Your ' . $formType . ' - Biopharma Academy')
            ->view('emails.ebook_download_user')
            ->with(['data' => $this->data]);

        if (file_exists($this->pdfPath)) {
            $email->attach($this->pdfPath, [
                'as' => basename($this->pdfPath),
                'mime' => 'application/pdf',
            ]);
        }

        return $email;
    }
}
