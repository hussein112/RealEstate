<?php

namespace App\Listeners;

use App\Notifications\AssignedAdvertise;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class AdvertiseAssignedListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send($event->employee, new AssignedAdvertise($event->advertisement));
    }
}
