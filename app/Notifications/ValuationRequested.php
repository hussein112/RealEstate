<?php

namespace App\Notifications;

use App\Models\Valuation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ValuationRequested extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Valuation $valuation
    )
    {
        //
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
            'valuation_id' => $this->valuation->id,
            'full_name' => $this->valuation->full_name,
            'for' => $this->valuation->for,
            'type' => $this->valuation->type
        ];
    }

    public function toBroadcast(){
        return new BroadcastMessage([
            'valuation_id' => $this->valuation->id,
            'full_name' => $this->valuation->full_name,
            'for' => $this->valuation->for,
            'type' => $this->valuation->type
        ]);
    }
}
