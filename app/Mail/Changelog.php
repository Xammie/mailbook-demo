<?php

declare(strict_types=1);

namespace App\Mail;

use App\Services\ChangelogService;
use Illuminate\Mail\Mailable;

class Changelog extends Mailable
{
    public function __construct(private readonly ChangelogService $changelogService)
    {
    }

    public function build(): self
    {
        return $this
            ->markdown('mail.changelog')
            ->subject('Changelog')
            ->to('developers@mailbook.dev', 'Developers')
            ->with([
                'changelog' => $this->changelogService->retrieve(),
            ]);
    }
}
