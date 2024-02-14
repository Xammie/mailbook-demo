<?php

declare(strict_types=1);

namespace App\Mail\Account;

use Illuminate\Mail\Mailable;

class AccountCreated extends Mailable
{
    public function build(): self
    {
        return $this
            ->markdown('mail.account-created')
            ->subject(__('Welcome to our platform!'))
            ->to('user@example.com', 'User');
    }
}
