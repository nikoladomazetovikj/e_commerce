<?php

namespace App\Listeners;

use App\Events\SendOrderNotificationEvent;
use App\Notifications\CustomerPay;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderNotificationSend
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendOrderNotificationEvent  $event
     * @return void
     */
    public function handle(SendOrderNotificationEvent $event)
    {
       return $event->user->notify(new CustomerPay($event->orderId));
    }
}
