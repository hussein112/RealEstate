<?php

namespace App\Listeners;

use App\Notifications\AssignedEnquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class AssignedEnquiryListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send($event->employee, new AssignedEnquiry($event->enquiry));
    }
}
