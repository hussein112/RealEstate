<?php

namespace App\Notifications;

use App\Models\Admin;
use App\Models\Valuation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewValuation extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Valuation $valuation,
        public int $adminId
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
        return ['database', 'broadcast'];
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
        $admin = Admin::findOrFail($this->adminId);
        return [
            'message' => "A " . $this->valuation->type . " For Valuation in " . $this->valuation->city . " Assigned to You By " . $admin->f_name . " " . $admin->lname,
            'valuation_id' => $this->valuation->id
        ];
    }


    public function toBroadcast(){
        $admin = Admin::findOrFail($this->adminId);
        return new BroadcastMessage([
            'message' => "A " . $this->valuation->type . " For Valuation in " . $this->valuation->city . " Assigned to You By " . $admin->f_name . " " . $admin->lname,
            'valuation_id' => $this->valuation->id
        ]);
    }
}
