<?php

namespace App\Events;

use App\Models\Advertise;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UnassignedAdvertisementEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Advertise $advertisement;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($advertisement)
    {
        $this->advertisement = $advertisement;
    }

    public function broadcastAs(){
        return 'unAssignedAdvertisement';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('admin-advertise');
    }
}
