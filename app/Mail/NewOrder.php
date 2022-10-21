<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class NewOrder extends Mailable
{
    public function build(): self
    {
        return $this
            ->markdown('mail.new-order')
            ->subject(__('Order confirmation'))
            ->to('user@mailbook.dev', 'S. Hopper')
            ->bcc('manager@mailbook.dev', 'CEO')
            ->with('products', [
                [
                    'name' => __('Laravel mug'),
                    'quantity' => 10,
                    'price' => '$ 100',
                ],
                [
                    'name' => __('Laravel shirt'),
                    'quantity' => 2,
                    'price' => '$ 50',
                ],
            ]);
    }
}
