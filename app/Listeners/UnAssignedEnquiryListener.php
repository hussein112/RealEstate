<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Notifications\UnassignedEnquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class UnAssignedEnquiryListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send(Admin::all(), new UnassignedEnquiry($event->enquiry));
    }
}
