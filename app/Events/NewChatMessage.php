<?php

namespace App\Events;


use App\Models\Chat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $replyChat;

    public function __construct(Chat $replyChat)
    {
        $this->replyChat = $replyChat;
    }

    public function broadcastOn()
    {
        return new Channel('chat');
    }
    public function broadcastAs()
    {
        return 'NewChatMessage';
    }
}
