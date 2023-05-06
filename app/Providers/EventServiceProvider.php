<?php

namespace App\Providers;

use App\Events\AdvertiseAssignedEvent;
use App\Events\AssignedEnquiryEvent;
use App\Events\EnquiryAssigned;
use App\Events\NewValuationRequest;
use App\Events\TestingEvent;
use App\Events\UnAssignedEnquiryEvent;
use App\Events\ValuationAssignedEvent;
use App\Events\ValuationRequestedEvent;
use App\Listeners\AdvertiseAssignedListener;
use App\Listeners\AssignedEnquiryListener;
use App\Listeners\SendEnquiryAssignedNotifications;
use App\Listeners\SendNewValuationRequestedNotification;
use App\Listeners\TestingEventListener;
use App\Listeners\UnAssignedEnquiryListener;
use App\Listeners\ValuationAssignedListener;
use App\Listeners\ValuationRequestedListener;
use App\Notifications\UnassignedEnquiry;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ValuationRequestedEvent::class => [
            ValuationRequestedListener::class
        ],
        AssignedEnquiryEvent::class => [
            AssignedEnquiryListener::class
        ],
        UnAssignedEnquiryEvent::class => [
            UnAssignedEnquiryListener::class
        ],
        ValuationAssignedEvent::class => [
            ValuationAssignedListener::class
        ],
        AdvertiseAssignedEvent::class => [
            AdvertiseAssignedListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
