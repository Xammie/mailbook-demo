@component('mail::message')
# {{ __('Thank you for your order') }}

{{ __('Your order has been processed and is now being shipped. Your order details are shown below for your reference:') }}

@component('mail::table')
| {{ __('Product') }} | {{ __('Quantity') }} | {{ __('Price') }} |
|:---------------------|:------------------:|------------------:|
@foreach ($products as $product)
| {{ $product['name'] }} | {{ $product['quantity'] }} | {{ $product['price'] }} |
@endforeach
@endcomponent

@if($withTracker)
{{ __('You can track it here with the following link.') }}
@component('mail::button')
{{ __('Track your package') }}
@endcomponent
@slot('subcopy')
{{ __('If you are having trouble clicking the "Track your package" button, copy and paste the URL below into your web browser:') }}<br><a href="https://mailbook.dev/" target="_blank">https://mailbook.dev/</a>
@endslot
@else
{{ __('It has been shipped without a tracking link') }}
@endif

## {{ __('Address') }}
S. Hopper<br>
1234 Main St<br>
Anytown, CA 12345
@endcomponent
