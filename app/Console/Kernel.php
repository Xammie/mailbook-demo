<?php

declare(strict_types=1);

namespace App\Console;

use App\Console\Commands\CacheMarkdown;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Override;

class Kernel extends ConsoleKernel
{
    /** @var string[] */
    protected $commands = [
        CacheMarkdown::class,
    ];

    #[Override]
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(CacheMarkdown::class)->hourly();
    }
}
