@component('mail::message')
    <p>On the way to you </p>
    <p>We would like to inform you that the processing rate of
        your order {{ $order->project_id }} has reached {{ $order->percent }} %.
        You can download your final translated file by clicking on the button below.</p>
    <br>
    <span style='display:inline-block ;width: 103%;text-align: right; font-weight: bolder'>100%</span>
    <div class="progress" style='position:relative;'>
        <div class="progress-bar" role="progressbar" style="width: {{ $order->percent."%" }} ; "
            aria-valuenow="{{ $order->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <span style='display: inline-block; width: 103%; text-align: right; font-weight: bolder;'>
        uploading
    </span>
    <br>
    <br>
    <div style='text-align: center; margin: 20px auto'>
        <a href='{{ config("app.url")."/orders" }}'
            style='text-align: center; margin: 20px auto; cursor: pointer;
                                        background-color: black; color: white; padding: 15px; border-radius: 10px; '>
            Download
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
