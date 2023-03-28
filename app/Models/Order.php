<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ["file_name","translated_file_name"];

    protected static function booted()
    {
        static::creating(function (Order $order){
            $order->project_id = Order::generateProjectId();
            $order->user_id = auth()->id();
        });
    }

    public static function storeRules()
    {
        return [
                "file_type" => "required|max:255",
                "uploaded_file" => "required|mimes:pdf,doc,docx,txt",
                "translate_from" => "required|string",
                "translate_to" => "required|string",
                "subject_field" => "required|string",
                "specialist" => "nullable|string",
                "type" => "nullable|string",
                "project_name" => "required|string"
             ];
    }

    public static function generateProjectId()
    {
        $projects_id = Order::query()->pluck("project_id");
        do{
            $project_id = rand(10000000, 99999999);
        }while($projects_id->contains($project_id));

        return $project_id;
    }

    public function getFileNameAttribute()
    {
        $fileName = explode("-",$this->file);
        return join(array_slice($fileName,1),"-");
    }

    public function getTranslatedFileNameAttribute()
    {
        $fileName = explode("-",$this->translated_file);
        return join(array_slice($fileName,1),"-");
    }

    public function payment()
    {
        return $this->hasOne(Payment::class,"order_id","id");
    }
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
