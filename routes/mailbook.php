<?php

use App\Mail\AccountDeleted;
use App\Mail\Changelog;
use App\Mail\NewOrder;
use App\Mail\OrderRefunded;
use App\Mail\OrderShipped;
use App\Mail\WelcomeToMailbook;
use Xammie\Mailbook\Facades\Mailbook;

Mailbook::add(WelcomeToMailbook::class);
Mailbook::add(Changelog::class);
Mailbook::add(NewOrder::class);
Mailbook::add(OrderShipped::class)
    ->variant('Tracking link', fn (): OrderShipped => new OrderShipped(true))
    ->variant('Post', fn (): OrderShipped => new OrderShipped(false));
Mailbook::add(OrderRefunded::class);
Mailbook::add(AccountDeleted::class);
