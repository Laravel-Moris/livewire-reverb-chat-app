<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('messages.{to}', function (User $user, $to) {
    return $user->id == $to;
});
