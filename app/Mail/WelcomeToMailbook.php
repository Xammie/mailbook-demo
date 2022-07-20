<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class WelcomeToMailbook extends Mailable
{
    public function build(): self
    {
        return $this->markdown('mail.welcome-to-mailbook')->subject('Explore your Laravel mails');
    }
}
