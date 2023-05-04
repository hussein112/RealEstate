<?php

namespace App\Events;

use App\Models\Admin;
use App\Models\Valuation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ValuationRequestedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Valuation $valuation;
    public Admin $admin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($valuation, $admin)
    {
        $this->valuation = $valuation;
        $this->admin = $admin;
    }

    public function broadcastAs(){
        return 'valuationRequest';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('admin.valuation.' . $this->admin->id);
    }
}
