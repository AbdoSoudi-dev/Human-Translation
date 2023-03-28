<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function (Payment $order){
            $order->invoice_id = Payment::getInvoiceId();
            $order->user_id = auth()->id();
        });
    }
    public static function getInvoiceId()
    {
        $year = Carbon::now()->year;
        $number = Payment::whereYear('created_at',$year)->max('invoice_id');

        return $number ? ($number + 1) : ($year . '00001') ;
    }

    public function order()
    {
        return $this->belongsTo(Order::class,"order_id","id");
    }
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
