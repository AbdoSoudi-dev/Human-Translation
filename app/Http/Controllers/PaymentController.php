<?php

namespace App\Http\Controllers;

use App\Events\NewPaymentProccessCreated;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\PaymentMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $rules =[
            "email" => "required|min:10",
            "image" => [
                Rule::requiredIf(in_array($request->payment_method,["wise","skrill"])),
                "mimes:jpg,jpeg,png"
            ],
            "payment_method" => "required|in:wise,skrill,paypal"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json(["error" => $validator->errors()->first()],200);
        }
        $request->merge([
            "status" => in_array($request->payment_method,["wise","skrill"]) ? "pending" : "done",
            "method" => $request->payment_method
        ]);
        $data = $request->except(["image","payment_method"]);

        if ($request->hasFile("image")){
            $image = $request->file("image");
            $imageName = date("YmdHis") . "-". $request->file("image")->getClientOriginalName();
            $image->move(public_path("/transaction images"),$imageName);
            $data["image"] = $imageName;
        }

        Payment::create($data);

        event(new NewPaymentProccessCreated($request->order_id));

        return response()->json("done",201);
    }

    public function getPayments()
    {
        $orders = Order::with("payment")
                    ->whereUserId(Auth::id())->latest()->paginate(5);

        $ifPayment = Order::whereUserId(Auth::id())->whereHas("payment")->count();

        return view("payments.payments",compact("orders","ifPayment"));
    }

    public function paymentPdf($id){
        $payment = Payment::with(["user","order"])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.invoice', [
            "payment" => $payment
        ]);

        return $pdf->download('widely24 invoice.pdf');
    }

    public function deletePayment(Payment $payment)
    {
        @unlink(public_path("transaction images/$payment->image"));
        $payment->order()->update([
            "status" => "unpaid",
            "percent" => 0
        ]);
        $payment->delete();

        return back()->with([
            "message" => "Payment has been deleted successfully!"
        ]);
    }
}
