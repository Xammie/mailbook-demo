<?php

declare(strict_types=1);

namespace App\Mail;

use App\Services\ReadmeService;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;

class WelcomeToMailbook extends Mailable
{
    public function __construct(private readonly ReadmeService $readmeService) {}

    public function build(): self
    {
        return $this
            ->view('mail.welcome-to-mailbook')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo('questions@mailbook.dev', 'Mailbook')
            ->subject(__('Explore your Laravel mails'));
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.welcome-to-mailbook',
            with: [
                'content' => $this->readmeService->render(),
            ],
        );
    }
}
