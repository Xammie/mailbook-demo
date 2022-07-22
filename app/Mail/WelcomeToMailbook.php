<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class WelcomeToMailbook extends Mailable
{
    public function build(): self
    {
        return $this
            ->markdown('mail.welcome-to-mailbook')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Explore your Laravel mails');
    }
}
