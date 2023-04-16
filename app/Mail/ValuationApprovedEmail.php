<?php

namespace App\Mail;

use App\Models\Valuation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValuationApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $valuation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($valuation)
    {
        $valuation = $this->valuation;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: "company@email.com",
            subject: 'Valuation Approved Email',

        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.valuations.approved',
            with: [
                'id' => $this->valuation->id,
                'description' => $this->valuation->description
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
