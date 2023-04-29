<?php

use App\Models\Admin;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('enquiries', function ($user) {
    return ! is_null($user);
}, ['guards' => ['employee']]);


Broadcast::channel('valuation-request', function ($user) {
    return ! is_null($user);
}, ['guards' => ['admin']]);
