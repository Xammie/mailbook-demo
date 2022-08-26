<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class OrderShipped extends Mailable
{
    public function __construct(public readonly bool $withTracker)
    {
    }

    public function build(): self
    {
        return $this
            ->markdown('mail.order-shipped')
            ->subject('Order #1234 has been shipped')
            ->attachData('Your order has been shipped!', 'order-1234.pdf');
    }
}
