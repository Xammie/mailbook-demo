<?php

namespace App\Providers;

use App\Mail\OrderRefunded;
use App\Mail\WelcomeToMailbook;
use Illuminate\Support\ServiceProvider;
use Xammie\Mailbook\Facades\Mailbook;

class MailbookProvider extends ServiceProvider
{
    public function boot(): void
    {
        Mailbook::add(WelcomeToMailbook::class);
        Mailbook::add(OrderRefunded::class);
    }
}
