<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('check-status.{deviceCode}', function ($devices_codes, $deviceCode) {
    return $devices_codes->code === $deviceCode;
});
// Broadcast::channel('refresh-playlist-{deviceCode}', function ($user, $deviceCode) {
//     return true; // or add your authorization logic here
// });
