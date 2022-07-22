@component('mail::message')
# Hello user,

Your account has been deleted.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
