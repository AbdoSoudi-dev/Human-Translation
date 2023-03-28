@component('mail::message')
    <p>Hello {{ $user->name }} </p>
    <p>On the way to you </p>
    <p>We are reviewing our {{ $payment->method }} account and we'll work on your file ASAP. </p>
    <div style='text-align: center; margin: 20px auto'>
        <br>
        <a href='{{ config("app.url")."/orders" }}'
            style='text-align: center; margin: 20px auto; cursor: pointer;
                                        background-color: black; color: white; padding: 5px 10px;border-radius: 10px;'>
            View your request </a> <br>
    </div>
    <br>
    <br>
    <p>If you need assistance with this process please contact
        the widely24 Team (support@widely24.com).</p>
    <br>
    <br>
    Thanks, <br>
    Team widely24
@endcomponent
