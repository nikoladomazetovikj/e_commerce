<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CompanyOrderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($title, $companyName, $managerEmail, $seeds, $managerName, $companyEmail,
                                $estimateDelivery, $order)
    {
        $this->title = $title;
        $this->companyName = $companyName;
        $this->managerEmail = $managerEmail;
        $this->seeds = $seeds;
        $this->managerName = $managerName;
        $this->companyEmail = $companyEmail;
        $this->estimateDelivery = $estimateDelivery;
        $this->order = $order;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    //  As we don't use broadcasts channels we don't need this method
    //public function broadcastOn()
    //{
      //  return new PrivateChannel('channel-name');
    //}
}
