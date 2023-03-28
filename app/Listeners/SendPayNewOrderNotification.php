<?php

namespace App\Listeners;

use App\Notifications\PayNewOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Events\NewOrderCreated;

class SendPayNewOrderNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(NewOrderCreated $event)
    {
        $user = $event->user;
        $order = $event->order;
        $user->notify(new PayNewOrderNotification($order,$user));
    }
}
