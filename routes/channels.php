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

Broadcast::channel('admin.valuation.{id}', function ($admin, $id) {
    return ! is_null($admin);
}, ['guards' => ['admin']]);

Broadcast::channel('admin.enquiry', function ($admin) {
    return ! is_null($admin);
}, ['guards' => ['admin']]);


Broadcast::channel('employee.enquiry.{id}', function ($employee, $id) {
    return ! is_null($employee);
}, ['guards' => ['employee']]);


Broadcast::channel('employee.valuation.{id}', function ($employee, $id) {
    return ! is_null($employee);
}, ['guards' => ['employee']]);


Broadcast::channel('employee.advertise.{id}', function ($employee, $id) {
    return ! is_null($employee);
}, ['guards' => ['employee']]);

Broadcast::channel('admin.advertise.{id}', function ($admin, $id) {
    return ! is_null($admin);
}, ['guards' => ['admin']]);
