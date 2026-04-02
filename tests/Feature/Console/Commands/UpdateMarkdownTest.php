<?php

declare(strict_types=1);

namespace Tests\Feature\Console\Commands;

use App\Console\Commands\CacheMarkdown;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

final class UpdateMarkdownTest extends TestCase
{
    public function test_can_update_the_markdown_cache(): void
    {
        Http::fake([
            'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
            'https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/CHANGELOG.md'),
        ]);

        $this->artisan(CacheMarkdown::class)->assertExitCode(0);

        $this->assertTrue(Cache::has('mailbook-readme'));
        $this->assertTrue(Cache::has('mailbook-changelog'));
    }
}
