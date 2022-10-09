<?php

namespace App\Console;

use App\Console\Commands\CacheMarkdown;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        CacheMarkdown::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(CacheMarkdown::class)->hourly();
    }
}
