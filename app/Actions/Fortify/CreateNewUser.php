<?php

namespace App\Actions\Fortify;

use App\Events\NewOrderCreated;
use App\Mail\PaymentMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            if (session()->has("order_id")){
                $order = Order::find(session()->get("order_id"));
                $order->update(["user_id" => $user->id]);
                event(new NewOrderCreated($order, $user));
                session()->remove("order_id");
            }
            DB::commit();

            return $user;
        }catch (\Throwable $exception){
            DB::rollBack();
            throw $exception;
        }

    }
}
