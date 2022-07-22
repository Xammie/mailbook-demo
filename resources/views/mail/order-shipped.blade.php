@component('mail::message')
# Hello

We have great news your order has been shipped and is estimated to arrive in 2 workdays.

@if($withTracker)
You can track it here with the following link.
@component('mail::button')
Track your package
@endcomponent
@slot('subcopy')
    If you are having trouble clicking the "Track your package" button, copy and paste the URL below into your web browser:<br><a href="https://mailbook.dev/" target="_blank">https://mailbook.dev/</a>
@endslot
@else
It has been shipped without a tracking link
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
