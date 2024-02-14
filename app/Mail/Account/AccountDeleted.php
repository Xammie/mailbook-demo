<?php

declare(strict_types=1);

namespace App\Mail\Account;

use Illuminate\Mail\Mailable;

class AccountDeleted extends Mailable
{
    public function build(): self
    {
        return $this
            ->markdown('mail.account-deleted')
            ->subject(__('Your account has been deleted'))
            ->to('user1@example.com', 'User')
            ->to('user2@example.com', 'User');
    }
}
