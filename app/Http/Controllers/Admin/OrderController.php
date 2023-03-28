<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PaymentMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Notifications\OrderFileUploadedNotification;
use App\Notifications\OrderProcessingNotification;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('isAdmin');
    }

    public function getOrders()
    {
        $orders = Order::with(["payment","user"])
            ->whereHas("user")
            ->whereNotNull("translated_file")
            ->latest()->paginate(5);
        $isTranslatedFiles = Order::whereNotNull("translated_file")->count();
        $orderDeliverAt = Order::whereNotNull("deliver_at")->count();
        return view("orders_admin", compact("orders","isTranslatedFiles","orderDeliverAt"));
    }

    public function getOrdersReview()
    {
        $orders = Order::with(["payment","user"])
            ->whereHas("user")
            ->whereNull("translated_file")
            ->latest()->paginate(5);
        $isTranslatedFiles = Order::whereNotNull("translated_file")->count();
        $orderDeliverAt = Order::whereNotNull("deliver_at")->count();
        return view("orders_review_admin", compact("orders","isTranslatedFiles","orderDeliverAt"));
    }

    public function editClientOrderProcess(Order $order,Request $request){
        $request->validate([
            "percent" => [ "required", "numeric", "max:100" ],
            "translated_file" => [ "nullable", "mimes:pdf,doc,docx,rtf,txt" ],
        ]);

        $user = User::find($order->user_id);

        $order->percent = $request->percent;
        if ($request->hasFile("translated_file")){
            $file = $request->file("translated_file");

            $fileName = date("YmdHis") . "-". $request->file("translated_file")->getClientOriginalName();
            $file->move(public_path("translated files"),$fileName);

            $order->translated_file = $fileName;
            $order->percent = 100;
            $order->status = "completed";
            $user->notify(new OrderFileUploadedNotification($order));
        }
        $order->save();

        if ($order->percent != 100){
            $user->notify(new OrderProcessingNotification($order));
        }

        return back()->with([
            "message" => "Order process has been updated successfully!"
        ]);
    }
}
