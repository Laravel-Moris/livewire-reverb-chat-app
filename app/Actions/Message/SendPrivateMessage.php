<?php

namespace App\Actions\Message;

use App\Events\PrivateMessageSent;
use App\Models\User;

class SendPrivateMessage
{
    public function execute($username, $name, $message)
    {
        $user = User::where('username', '=', $username)->first();

        if (blank($user)) {
            return;
        }

        broadcast(new PrivateMessageSent($user->id, $name, $message));
    }
}
