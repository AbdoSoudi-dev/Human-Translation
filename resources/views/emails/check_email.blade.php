@component('mail::message')
    Hello: {{ $name[0] }}
    <br>
    Thank you for registration.
    <br>

    <p> {{ config("app.name") }}: </p>
    <p> support@widely24.com </p>
@endcomponent

