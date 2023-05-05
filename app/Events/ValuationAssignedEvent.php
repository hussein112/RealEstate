<?php

namespace App\Events;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\Valuation;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ValuationAssignedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Valuation $valuation;
    public Employee $employee;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($valuation, $employee)
    {
        $this->valuation = $valuation;
        $this->employee = $employee;
    }


    public function broadcastAs(){
        return 'newValuationAssigned';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('employee.valuation.' . $this->employee->id);
    }
}
