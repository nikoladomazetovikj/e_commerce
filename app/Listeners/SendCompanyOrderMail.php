<?php

namespace App\Listeners;

use App\Events\CompanyOrderEvent;
use App\Mail\CompanyOrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCompanyOrderMail
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
     * @param  \App\Events\CompanyOrderEvent  $event
     * @return void
     */
    public function handle(CompanyOrderEvent $event)
    {
        Mail::to($event->companyEmail)->send(new CompanyOrderMail(
            $event->title,
            $event->companyName,
            $event->managerEmail,
            $event->seeds,
            $event->managerName,
            $event->companyEmail,
            $event->estimateDelivery,
            $event->order
        ));
    }
}
