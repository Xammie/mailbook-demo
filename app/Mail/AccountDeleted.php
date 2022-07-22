<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AccountDeleted extends Mailable
{
    public function build(): self
    {
        return $this->markdown('mail.account-deleted')->subject('Your account has been deleted');
    }
}
