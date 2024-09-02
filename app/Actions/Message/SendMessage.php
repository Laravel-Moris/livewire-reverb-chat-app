<?php

namespace App\Actions\Message;

use App\Events\MessageSent;

class SendMessage
{
    public function execute($name, $message)
    {
        broadcast(new MessageSent($name, $message));
    }
}
