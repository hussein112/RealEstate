<?php

namespace App\Providers;

use App\Events\EnquiryAssigned;
use App\Events\NewValuationRequest;
use App\Events\TestingEvent;
use App\Listeners\SendEnquiryAssignedNotifications;
use App\Listeners\SendNewValuationRequestedNotification;
use App\Listeners\TestingEventListener;
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
        EnquiryAssigned::class => [
            SendEnquiryAssignedNotifications::class
        ],
        NewValuationRequest::class => [
            SendNewValuationRequestedNotification::class
        ]
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
