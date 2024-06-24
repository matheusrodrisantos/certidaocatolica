<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $file;

    /**
     * Create a new message instance.
     */
    public function __construct($details,$file='')
    {
        $this->details = $details;
        $this->file=$file;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Certidão aprovada!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.approved',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if(!empty($this->file)){
            return [
                Attachment::fromStorage($this->file)
                ->as('certidao.pdf'),
            ];
        }

        return [];

    }
}
