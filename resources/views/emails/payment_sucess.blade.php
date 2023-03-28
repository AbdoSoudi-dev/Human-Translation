@component('mail::message')
    <p>Hello {{ $user->name }} </p>
    <p>On the way to you </p>
    <p>Your order has been successfully accepted Order
        {{ $order->project_id }} You may click below to check status or
        upload your invoice payment. </p> <br>
    <p>Proceed translation request for your file </p>
    <div style='text-align: center; margin: auto'>
        <a href='{{ config("app.url") . '/orders' }}'
            style='text-align: center; margin: 20px auto; cursor: pointer;
                    background-color: black; color: white;
                     padding: 10px 15px;border-radius: 10px;'>
            View your request</a> <br>
    </div>
    <br>
    <br>
    <p>Project Name: {{ $order->project_name }} </p>
    <p>Project ID: {{ $order->project_id }} </p>
    <p>Translate From: {{ $order->trans_from }} </p>
    <p>Translate To: {{ $order->trans_to }} </p>
    <p>Creation Date:{{ date("M d, Y, h:i A",strtotime($order->created_at)) }} </p>
    <p>Words Count: {{ $order->words }} </p>
    <p>Amount Due:{{ $order->amount}} </p>
    Send To: <br>
    {{ $user->name }} <br>
    Payment method: <br>
    {{ $payment->method }} <br><br>
    <br>
    <p>If you need assistance with this process please contact
        the widely24 Team (support@widely24.com).</p>
    <br>
    <br>
    Thanks, <br>
    Team widely24
@endcomponent
