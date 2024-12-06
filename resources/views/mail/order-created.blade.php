@component('mail::message')
# {{ __('Thank you for your order') }}

{{ __('Your order has been received and is now being processed. Your order details are shown below for your reference:') }}

@component('mail::table')
|  | {{ __('Product') }} | {{ __('Quantity') }} | {{ __('Price') }} |
|:---------------------|:---------------------|:------------------:|------------------:|
@foreach ($products as $product)
| <img src="{{ $message->embed(public_path($product['image'])) }}" height="64px" alt="{{ $product['name'] }}"> |{{ $product['name'] }} | {{ $product['quantity'] }} | {{ $product['price'] }} |
@endforeach
@endcomponent

## {{ __('Address') }}
S. Hopper<br>
1234 Main St<br>
Anytown, CA 12345

@endcomponent
