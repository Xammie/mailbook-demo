<?php

declare(strict_types=1);

use App\Mail\Account\AccountCreated;
use App\Mail\Account\AccountDeleted;
use App\Mail\Changelog;
use App\Mail\Orders\OrderCreated;
use App\Mail\Orders\OrderShipped;
use App\Mail\WelcomeToMailbook;
use Xammie\Mailbook\Facades\Mailbook;

Mailbook::add(WelcomeToMailbook::class)->label('Welcome to Mailbook');
Mailbook::add(Changelog::class);

Mailbook::category('Orders')->group(function (): void {
    Mailbook::add(OrderCreated::class);
    Mailbook::add(OrderShipped::class)
        ->variant('Tracking link', fn (): OrderShipped => new OrderShipped(true))
        ->variant('Post', fn (): OrderShipped => new OrderShipped(false));
});

Mailbook::category('Account')->group(function (): void {
    Mailbook::add(AccountCreated::class);
    Mailbook::add(AccountDeleted::class);
});
