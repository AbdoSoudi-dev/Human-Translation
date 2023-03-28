<?php

namespace App\Http\Controllers;


use App\Events\NewOrderCreated;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use countword;

class OrderController extends Controller
{
    public function calculateWords(Request $request)
    {
        $request->validate([
            "uploaded_file" => "required|mimes:pdf,doc,docx,txt,ppt,pptx"
        ],[
            "uploaded_file.required" => "File is required",
            "uploaded_file.mimes" => "File format can be pdf, powerpoint, txt & word only"
        ]);

        $file = $request->file("uploaded_file");

        $counter = new Countword();
        $count  = $counter->count($file);

        if ($count == 0){
            return response()->json(false,401);
        }

        return [
            "count" => $count,
            "amount" => number_format($count * 0.012,2)
        ];
    }

    public function storeOrder(Request $request)
    {
        $request->validate(Order::storeRules());

        $file = $request->file("uploaded_file");

        $counter = new Countword();
        $words_count  = $counter->count($file);

        $fileName = date("YmdHis") . "-". $request->file("uploaded_file")->getClientOriginalName();
        $file->move(public_path("files orders"),$fileName);

        $order = Order::create([
            "file_type" => $request->post('file_type'),
            "file" => $fileName,
            "trans_from" => $request->post('translate_from'),
            "trans_to" => $request->post('translate_to'),
            "field" => $request->post('custom_field') ?? $request->post('subject_field'),
            "specialist" => $request->post('custom_specialist') ?? $request->post('specialist'),
            "field_type" => $request->post('type'),
            "project_name" => $request->post('project_name'),
            "words" =>  $words_count,
            "amount" => str_replace(",","",number_format($words_count * 0.012,2))
        ]);

        if (auth()->check()){
            event(new NewOrderCreated($order, auth()->user()));
        }else{
            session()->put([ "order_id" => $order->id ]);
        }

        return redirect()->route(auth()->check() ? "orders" : "register");
    }

    public function getOrders(){
        $orders = Order::whereUserId(auth()->id())->paginate(5);
        $isTranslatedFiles = Order::whereUserId(auth()->id())->whereNotNull("translated_file")->get();
        $orderDeliverAt = Order::whereUserId(auth()->id())->whereNotNull("deliver_at")->get();
        return view("orders.orders",compact("orders","isTranslatedFiles","orderDeliverAt"));
    }

    public function show($id){

        $order = Order::whereUserId(auth()->id())
                    ->whereDoesntHave("payment")
                    ->findOrFail($id);

        return view("payments.checkout",compact("order"));
    }

    public static function updateOrder($id,$methodStatus){
        $order = Order::find($id);

        $order->status = "reviewing payment process";

        if ($methodStatus == "done"){
            $order->deliver_at = Carbon::now()->addDays(3)->format("Y-m-d");
            $order->status = "pending";
            $order->percent = 5;
        }
        $order->save();
    }

    public function ordersSessionCheck()
    {
        if (session()->has("order_id")){
            $order = Order::find(session()->get("order_id"));
            @unlink(public_path("files orders/$order->file"));
            $order->delete();
        }
    }

    public function trackingOrderStages($id){
        $order = Order::with("payment")
                        ->whereHas("payment",function ($query){
                            return $query->whereStatus("done");
                        })
                        ->whereNull("translated_file")
                        ->findOrFail($id);
        return view("orders.tracking_order_stages", compact("order"));
    }

    public function deleteOrder(Order $order)
    {
        @unlink(public_path("files orders/$order->file"));

        $order->delete();

        return back()->with([
            "message" => "Order has been deleted successfully!"
        ]);
    }
}
