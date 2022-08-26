<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class NewOrder extends Mailable
{
    public function build(): self
    {
        return $this
            ->markdown('mail.order-refunded')
            ->subject('New order')
            ->to('backoffice@mailbook.dev', 'Backoffice')
            ->bcc('manager@mailbook.dev', 'CEO');
    }
}
