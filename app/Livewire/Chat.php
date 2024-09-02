<?php

namespace App\Livewire;

use App\Actions\Message\SendMessage;
use App\Actions\Message\SendPrivateMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Chat extends Component
{
    public $messages = [];

    public $message = '';

    public User $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function getListeners()
    {
        return [
            'echo:messages,MessageSent' => 'messageReceive',
            "echo-private:messages.{$this->user->id},PrivateMessageSent" => 'privateMessageReceive',
        ];
    }

    public function send()
    {
        $username = Str::match('/@([\w-]+)/', $this->message);

        if (! blank($username)) {

            resolve(SendPrivateMessage::class)
                ->execute($username, $this->user->username, $this->message);

            $this->messages[] = [
                'name' => $this->user->username,
                'message' => $this->message,
                'is_private' => true,
            ];

            return;
        }

        resolve(SendMessage::class)->execute($this->user->username, $this->message);
    }

    public function privateMessageReceive($event)
    {
        $this->messages[] = [
            'name' => $event['name'],
            'message' => $event['message'],
            'is_private' => true,
        ];
    }

    public function messageReceive($event)
    {
        $this->messages[] = [
            'name' => $event['name'],
            'message' => $event['message'],
            'is_private' => false,
        ];
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
