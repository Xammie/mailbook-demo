<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

final class ScheduleTest extends TestCase
{
    public function test_can_run_schedule(): void
    {
        Http::fake([
            'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
            'https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/CHANGELOG.md'),
        ]);

        $this->artisan('schedule:run')->assertOk();
    }
}
