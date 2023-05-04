<?php

namespace App\Listeners;

use App\Notifications\NewValuation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ValuationAssignedListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send($event->employee, new NewValuation($event->valuation, Auth::guard("admin")->id()));
    }
}
