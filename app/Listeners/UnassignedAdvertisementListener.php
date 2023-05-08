<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Notifications\UnassignedAdvertisement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UnassignedAdvertisementListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send(Admin::all(), new UnassignedAdvertisement($event->advertisement));
    }
}
