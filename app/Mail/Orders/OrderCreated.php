<?php

declare(strict_types=1);

namespace App\Mail\Orders;

use Illuminate\Mail\Mailable;

class OrderCreated extends Mailable
{
    public function build(): self
    {
        $this->theme = 'shop';

        return $this
            ->mailer('mailgun')
            ->tag('order-created')
            ->markdown('mail.order-created')
            ->subject(__('Order confirmation'))
            ->to('user@mailbook.dev', 'S. Hopper')
            ->bcc('manager@mailbook.dev', 'CEO')
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
