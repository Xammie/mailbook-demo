<?php

namespace App\Providers;

use App\Mail\AccountDeleted;
use App\Mail\OrderRefunded;
use App\Mail\OrderShipped;
use App\Mail\WelcomeToMailbook;
use Illuminate\Support\ServiceProvider;
use Xammie\Mailbook\Facades\Mailbook;

class MailbookProvider extends ServiceProvider
{
    public function boot(): void
    {
        Mailbook::add(WelcomeToMailbook::class);
        Mailbook::add(OrderShipped::class)
            ->variant('Tracking link', fn (): OrderShipped => new OrderShipped(true))
            ->variant('Post', fn (): OrderShipped => new OrderShipped(false));
        Mailbook::add(OrderRefunded::class);
        Mailbook::add(AccountDeleted::class);
    }
}
