<?php

namespace App\Events;

use App\Models\Advertise;
use App\Models\Employee;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdvertiseAssignedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Employee $employee;
    public Advertise $advertisement;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($employee, $advertisement)
    {
        $this->employee = $employee;
        $this->advertisement = $advertisement;
    }

    public function broadcastAs(){
        return 'new-advertise';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('employee.advertise.' . $this->employee->id);
    }
}
