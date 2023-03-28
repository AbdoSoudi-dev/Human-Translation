<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use \Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Admin\PaymentController as PaymentAdminController;
use App\Http\Controllers\Admin\OrderController as OrderAdminController;
use App\Http\Controllers\ContactUsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::view('/', 'index');
Route::view('/languages', 'header.languages')
    ->name("languages");
Route::view('/fields', 'header.fields')
    ->name("fields");
Route::view('/translate', 'header.translate')
    ->name("translate");
Route::view("/document","header.document")
    ->name("document");

Route::view("/privacy_policy","footer.privacy_policy")
    ->name("footer.privacy_policy");
Route::view("/terms_service","footer.terms_of_service")
    ->name("footer.terms_service");
Route::view("/about_us","footer.about_us")
    ->name("footer.about_us");

Route::post("/calculate_words", [ OrderController::class,"calculateWords"]);
Route::post("/store_order", [ OrderController::class,"storeOrder"])
    ->name("storeOrder");

Route::view("/track_order","orders.tracking_order")
    ->name("trackingOrder");
Route::get("/tracking_order/{order}",[ OrderController::class,"trackingOrderStages" ])
    ->name("trackingOrderStages");

Route::get("/contact_us",[ ContactUsController::class, "index" ])
    ->name("footer.contact_us");
Route::post("contact_us",[ ContactUsController::class, "sendMail" ])
    ->name("contact_us");

include __DIR__ . "/auth.php";

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session')
])->group(function () {

    Route::get("/orders", [ OrderController::class,"getOrders"])
        ->name("orders");
    Route::post("/orders_session", [ OrderController::class,"ordersSessionCheck"])
        ->name("ordersSessionCheck");

    Route::get("/checkout/{order}",[OrderController::class,"show"])
        ->name("checkout");
    Route::delete("/delete_order/{order}",[OrderController::class,"deleteOrder"])
        ->name("deleteOrder");


    Route::post("/store_payment",[PaymentController::class, "store"])
        ->name("payment.store");
    Route::get("/payments", [ PaymentController::class,"getPayments"])
        ->name("payments.payments");
    Route::get("/payment_pdf/{payment}",[PaymentController::class,"paymentPdf"])
        ->name("paymentPdf");
    Route::delete("/delete_payment/{payment}",[PaymentController::class,"deletePayment"])
        ->name("deletePayment");

    Route::get("/admin/payments", [ PaymentAdminController::class,"getPayments"])
        ->name("admin.payments");
    Route::post("/admin/payment", [ PaymentAdminController::class,"approve"])
        ->name("admin.payment");
    Route::delete("/admin/payment/{payment}", [ PaymentAdminController::class,"destroy"])
        ->name("admin.payment.destroy");
    Route::get("admin/orders",[ OrderAdminController::class, "getOrders"])
        ->name("admin.orders");
    Route::get("admin/orders_review",[ OrderAdminController::class, "getOrdersReview"])
        ->name("admin.ordersReview");
    Route::put("admin/orders/{order}",[ OrderAdminController::class, "editClientOrderProcess"])
        ->name("admin.orders.edit");

    Route::get("/profile_settings", [ UserController::class, "index" ])
        ->name("profileSettings");
    Route::post("/update_profile_settings", [ UserController::class, "updateUser" ])
        ->name("updateProfileSettings");


    Route::get("/send_email_services/{email}",function (Request $request){
        Mail::to($request->email)->send(new \App\Mail\ServiceMail());
        echo "We have send your email to `".$request->email."` Successfully";
    })->middleware('isAdmin');

    Route::get("download/{image}",function (Request $request){
        $filepath = public_path('transaction images/').$request->image;
        return response()->download($filepath);
    })->middleware('isAdmin');

});
