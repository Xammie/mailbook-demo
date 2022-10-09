<?php

use App\Console\Commands\CacheMarkdown;
use Illuminate\Support\Facades\Cache;

it('can update the markdown cache', function (): void {
    Http::fake([
        'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
        'https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/CHANGELOG.md'),
    ]);

    $this->artisan(CacheMarkdown::class)
        ->assertExitCode(0);

    expect(Cache::has('mailbook-readme'))->toBeTrue();
    expect(Cache::has('mailbook-changelog'))->toBeTrue();
});
