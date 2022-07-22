<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class OrderRefunded extends Mailable
{
    public function build(): self
    {
        return $this->markdown('mail.order-refunded')->subject('Order #1337 has been refunded');
    }
}
