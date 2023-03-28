<?php

namespace App\Listeners;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class UpdateOrderStatus
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
    public function handle($event)
    {
        $order = $event->order;
        $order->status = "reviewing payment process";
        if ($order->payment->status == "done"){
            $order->deliver_at = Carbon::now()->addDays(3)->format("Y-m-d");
            $order->status = "pending";
            $order->percent = 5;
        }
        $order->save();
    }
}
