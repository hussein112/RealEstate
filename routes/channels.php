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


Broadcast::channel('App.Models.Admin.{id}', function ($user) {
    return ! is_null($user);
}, ['guards' => ['admin']]);


Broadcast::channel('App.Models.Employee.{id}', function ($user) {
    return ! is_null($user);
}, ['guards' => ['employee']]);
