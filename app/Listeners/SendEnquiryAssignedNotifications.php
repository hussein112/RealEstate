<?php

namespace App\Listeners;

use App\Events\EnquiryAssigned;
use App\Models\Admin;
use App\Notifications\AssignedEnquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendEnquiryAssignedNotifications
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EnquiryAssigned  $event
     * @return void
     */
    public function handle(EnquiryAssigned $event)
    {
        Notification::send(Admin::all(), new AssignedEnquiry($event->enquiry));
    }
}
