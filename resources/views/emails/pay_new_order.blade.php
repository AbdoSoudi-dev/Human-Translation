@component('mail::message')
    <p>Hi {{ $user->name}} </p>
    <p>We have received your translation request.
        Once payment confirmation is received,
        we will immediately begin work on your project. </p>
    <br>
    <br>
    <p>Project Name: {{ $order->project_name }} </p>
    <p>Project ID: {{ $order->project_id }} </p>
    <p>Translate From: {{ $order->trans_from }} </p>
    <p>Translate To: {{ $order->trans_to }} </p>
    <p>Creation Date: {{ date("M d, Y, h:i A",strtotime($order->created_at)) }}</p>
    <p>Words Count: {{ $order->words }} </p>
    <p>Amount Due: {{ $order->amount }} </p>
    <br>
    <div style='text-align: center; margin: 20px auto' >
        <a href='{{config("app.url")."/orders"}}' style='text-align: center; margin: 20px auto; cursor: pointer;
                                        background-color: transparent; border: 1px solid #004488; color: #004488; padding: 15px; border-radius: 10px; '>
            View Project and Make Payment
        </a> <br>
    </div>
    <br>
    <p>If you need assistance with this process please contact
        the widely24 Team (support@widely24.com).</p>
    <br>
    <br>
    Thanks, <br>
    Team widely24
@endcomponent
