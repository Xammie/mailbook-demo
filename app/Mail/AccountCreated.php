<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AccountCreated extends Mailable
{
    public function build(): self
    {
        return $this
            ->markdown('mail.account-created')
            ->subject('Welcome to our platform!')
            ->to('user@example.com', 'User');
    }
}
