@component('mail::message')
    <p>Hello {{ $user_name }} </p>
    <p> Your payment has been failed </p>
    <p> {{ $order->project_id }} You may click below to check status or view more details.  </p>
    <div style='text-align: center; margin: 20px auto' >
        <a href='{{ config("app.url"). "/checkout/". $order->id }}' style='text-align: center; margin: 20px auto; cursor: pointer;
                                        background-color: black; color: white; padding: 10px 15px;border-radius: 10px;'>
            Return your order
        </a> <br>
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
