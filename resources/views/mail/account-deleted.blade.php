@component('mail::message')
# Hello user,

Your account has been deleted. We're sorry to see you go.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
