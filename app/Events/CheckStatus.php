<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CheckStatus
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
     public $deviceCode;
    /**
     * Create a new event instance.
     */
    public function __construct($deviceCode)
    {
        $this->deviceCode=$deviceCode;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('check-status.',$this->deviceCode),
        ];
    }
}
