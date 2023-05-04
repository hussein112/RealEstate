<?php

namespace App\Events;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\Enquiry;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssignedEnquiryEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public Enquiry $enquiry;
    public Employee $employee;  // The Assigned Employee for the enquiry

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($enquiry, $employee)
    {
        $this->enquiry = $enquiry;
        $this->employee = $employee;
    }

    public function broadcastAs(){
        return 'newEnquiry';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('employee.enquiry.' . $this->employee->id);
    }
}
