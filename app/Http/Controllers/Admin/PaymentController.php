<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewPaymentProccessCreated;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Notifications\FailedPaymentProcessNotification;
use App\Notifications\OrderProcessingNotification;
use Illuminate\Http\Request;
use App\Models\User;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware("isAdmin");
    }

    public function getPayments(){
        $orders = Order::with(["payment","user"])->whereHas("user")->latest()->paginate(5);
        $ifPayment = Order::whereHas("payment")->count();
        return view("payments.admin.payments",compact("orders","ifPayment"));
    }

    public function destroy(Payment $payment){
        @unlink(public_path("transaction images/$payment->image"));
        $payment->order()->update([
            "status" => "unpaid",
            "percent" => 0
        ]);

        $user = User::find($payment->user_id);
        $user->notify(new FailedPaymentProcessNotification($payment->order));

        $payment->delete();

        return back();
    }

    public function approve(Request $request){

        $payment = Payment::find($request->payment_id);
        $payment->update([
            "status" => "done"
        ]);

        $user = User::find($payment->user_id);

        event(new NewPaymentProccessCreated($request->order_id));
        $user->notify(new OrderProcessingNotification($payment->order));

        return back();
    }
}
