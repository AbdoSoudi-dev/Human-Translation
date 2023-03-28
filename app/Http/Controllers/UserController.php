<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view("profile.settings", compact("user"));
    }

    public function updateUser(Request $request){

        $user = User::find(auth()->id());

        $rules = [
            "current_password" =>["required",function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }] ,
            'password' =>  ['nullable', 'string', new Password, 'confirmed']
        ];

        $emailCheck = $request->email && $user->email !== $request->email;
        if ($emailCheck){
            $rules["email"] = ['required', 'string', 'email', 'max:255', "unique:users,$request->email"];
            $user->email = $request->email;
        }
        $request->validate($rules);

        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        if ($emailCheck){
            $request->user()->sendEmailVerificationNotification();
        }

        $user->save();

        return back()->with([
            "message" => "Profile settings has been updated successfully!"
        ]);

    }
}
