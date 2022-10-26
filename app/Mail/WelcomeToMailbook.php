<?php

namespace App\Mail;

use App\Services\ReadmeService;
use Illuminate\Mail\Mailable;

class WelcomeToMailbook extends Mailable
{
    public function __construct(private readonly ReadmeService $readmeService)
    {
    }

    public function build(): self
    {
        $readme = str($this->readmeService->retrieve())
            ->replace('# Mailbook', '# Welcome to Mailbook')
            ->replace('![Example screenshot](./screenshot.png)', '')
            ->replace('<p align="center"><a href="https://mailbook.dev/">View demo</a></p>', '')
            ->toString();

        return $this
            ->markdown('mail.welcome-to-mailbook')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo('questions@mailbook.dev', 'Mailbook')
            ->subject(__('Explore your Laravel mails'))
            ->with([
                'readme' => $readme,
            ]);
    }
}
