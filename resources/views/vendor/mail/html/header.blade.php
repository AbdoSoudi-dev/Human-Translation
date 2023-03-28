<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
    <img src="{{config("app.url") . "/images/logo-email-black.png" }}" width="100" style="width: 200px;" class="logo" alt="Widely logo">
@endif
</a>
</td>
</tr>
