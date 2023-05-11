<?php

namespace App\Mail;

use App\Models\Advertise;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdvertisementApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;


    public Advertise $advertisement;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advertisement)
    {
        $this->advertisement = $advertisement;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: config('company.reply_email'),
            replyTo: [
                new Address('foremployee_10@company.com', 'Employe Name')
            ],
            subject: 'Advertisement Approved',
            tags: ['advertise']
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
            view: 'emails.advertise.approved',
            with: [
                'advertisement' => $this->advertisement
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
