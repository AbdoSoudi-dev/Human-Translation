<?php

namespace App\Providers;

use App\Mail\CheckMail;
use App\Models\Order;
use Dotenv\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

            view()->composer('*', function($view)
            {
                if (Auth::check()){
                if (Gate::allows("isAdmin")){
                    $payment_notification = Order::whereNotNull("user_id")->whereDoesntHave("payment")->count();
                }else{
                    $payment_notification = Order::whereUserId(auth()->id())->whereDoesntHave("payment")->count();
                }
                View::share("payment_notification",$payment_notification);
                }
            });

        Paginator::useBootstrap();

    }
}
