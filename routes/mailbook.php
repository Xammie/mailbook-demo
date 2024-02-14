<?php

use App\Mail\AccountCreated;
use App\Mail\AccountDeleted;
use App\Mail\Changelog;
use App\Mail\OrderCreated;
use App\Mail\OrderShipped;
use App\Mail\WelcomeToMailbook;
use Xammie\Mailbook\Facades\Mailbook;

Mailbook::add(WelcomeToMailbook::class)->label('Welcome to Mailbook');
Mailbook::add(Changelog::class);

Mailbook::category('Orders')->group(function () {
    Mailbook::add(OrderCreated::class);
    Mailbook::add(OrderShipped::class)
        ->variant('Tracking link', fn (): OrderShipped => new OrderShipped(true))
        ->variant('Post', fn (): OrderShipped => new OrderShipped(false));
});

Mailbook::category('Account')->group(function () {
    Mailbook::add(AccountCreated::class);
    Mailbook::add(AccountDeleted::class);
});
