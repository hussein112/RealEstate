<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Notifications\ValuationRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ValuationRequestedListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send($event->admin, new ValuationRequested($event->valuation));
    }
}
