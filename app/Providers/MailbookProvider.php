<?php

namespace App\Providers;

use App\Mail\OrderRefunded;
use Illuminate\Support\ServiceProvider;
use Xammie\Mailbook\Facades\Mailbook;

class MailbookProvider extends ServiceProvider
{
    public function boot(): void
    {
        Mailbook::add(OrderRefunded::class);
    }
}
