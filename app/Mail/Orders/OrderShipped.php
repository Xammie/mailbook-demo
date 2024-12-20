<?php

declare(strict_types=1);

namespace App\Mail\Orders;

use Illuminate\Mail\Mailable;

class OrderShipped extends Mailable
{
    public function __construct(public readonly bool $withTracker) {}

    public function build(): self
    {
        $this->theme = 'shop';

        return $this
            ->markdown('mail.order-shipped')
            ->subject(__('Order has been shipped'))
            ->attachData('Your order has been shipped!', 'order-1234.pdf')
            ->with('products', [
                [
                    'image' => '/images/mug.webp',
                    'name' => __('Laravel mug'),
                    'quantity' => 10,
                    'price' => '$ 100',
                ],
                [
                    'image' => '/images/cap.webp',
                    'name' => __('Laravel snapback'),
                    'quantity' => 2,
                    'price' => '$ 50',
                ],
            ]);
    }
}
