<?php

namespace App\Notifications;

use App\Models\Advertise;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UnassignedAdvertisement extends Notification
{
    use Queueable;

    public Advertise $advertisement;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($advertisement)
    {
        $this->advertisement = $advertisement;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => "The advertisement id " . $this->advertisement->id . " cannot be assigned to any employee, since they are all at full capacity.",
            'enquiry_id' => $this->advertisement->id
        ];
    }
}
