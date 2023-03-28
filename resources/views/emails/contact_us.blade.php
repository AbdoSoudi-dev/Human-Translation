@component('mail::message')

    <p>From: {{ $name }}</p>
    <p>Email: {{ $email }}</p>

    <div style="margin: 10px auto;">
        {!! $body !!}
    </div>

@endcomponent
