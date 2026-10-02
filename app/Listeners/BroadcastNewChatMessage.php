<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewChatMessage;
use Illuminate\Support\Facades\Broadcast;

class BroadcastNewChatMessage implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NewChatMessage $event)
    {
      
        Broadcast::event('chat', new \App\Events\NewChatMessage($event->replyChat));
    }
}
