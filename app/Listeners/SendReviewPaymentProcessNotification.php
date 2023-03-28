<?php

namespace App\Listeners;

use App\Notifications\ReviewPaymentProcessNotification;
use App\Notifications\SuccessPaymentProcessNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class SendReviewPaymentProcessNotification
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
        $payment = $order->payment;
        $user = Auth::user();
        if ($payment->status == "done")
        {
            $user->notify(new SuccessPaymentProcessNotification($order));
        }else
        {
            $user->notify(new ReviewPaymentProcessNotification($order));
        }
    }
}
