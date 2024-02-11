<?php

use function Pest\Laravel\artisan;

it('can run schedule', function (): void {
    Http::fake([
        'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
        'https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/CHANGELOG.md'),
    ]);

    artisan('schedule:run')->assertOk();
});
