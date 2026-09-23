<?php

declare(strict_types=1);

use App\Mail\Account\AccountCreated;
use App\Mail\Account\AccountDeleted;
use App\Mail\Changelog;
use App\Mail\Orders\OrderCreated;
use App\Mail\Orders\OrderShipped;
use App\Mail\WelcomeToMailbook;
use Xammie\Mailbook\Facades\Mailbook;

Mailbook::add(WelcomeToMailbook::class)
    ->label('Welcome to Mailbook')
    ->comment('Welcome to Mailbook. Mailbook makes it possbile to preview your mailables without sending them to your actual inbox');

Mailbook::add(Changelog::class)
    ->comment('This is the actual changelog of xammie/mailbook');

Mailbook::category('Orders')->group(function (): void {
    Mailbook::add(OrderCreated::class)
        ->comment('Sent to customers immediately after a successful purchase is confirmed');
    Mailbook::add(OrderShipped::class)
        ->comment('Sent when an order leaves the warehouse and is on its way to the customer')
        ->variant('Tracking link', fn (): OrderShipped => new OrderShipped(true))
        ->variant('Post', fn (): OrderShipped => new OrderShipped(false));
});

Mailbook::category('Account')->group(function (): void {
    Mailbook::add(AccountCreated::class)
        ->comment('Sent to new users right after they complete the registration process');
    Mailbook::add(AccountDeleted::class)
        ->comment('Sent when a user requests account deletion or violates platform terms');
});
