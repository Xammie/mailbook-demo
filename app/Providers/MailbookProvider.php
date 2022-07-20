<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MailbookProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (! config('app.debug')) {
            return;
        }


    }
}
