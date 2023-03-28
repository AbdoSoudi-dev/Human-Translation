<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view("footer.contact_us");
    }

    public function sendMail(Request $request){
        $request->validate([
            "name" => ["required","string"],
            "email" => ["required","string","email"],
            "subject" => ["required","string"],
            "body" => ["required","string"]
        ]);

        Mail::to("abdosaudi011@gmail.com")
            ->send(new ContactUsMail($request->all()));
        return back()->with([
            "message" => "Email has been sent successfully! <br> Thank you for contact us."
        ]);
    }
}
