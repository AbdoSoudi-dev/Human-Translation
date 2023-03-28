<?php

namespace App\Providers;

use App\Events\NewOrderCreated;
use App\Events\NewPaymentProccessCreated;
use App\Listeners\SendPayNewOrderNotification;
use App\Listeners\SendReviewPaymentProcessNotification;
use App\Listeners\UpdateOrderStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewOrderCreated::class => [
            SendPayNewOrderNotification::class
        ],
        NewPaymentProccessCreated::class => [
            UpdateOrderStatus::class,
            SendReviewPaymentProcessNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
