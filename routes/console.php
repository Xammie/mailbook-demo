<?php

declare(strict_types=1);

use App\Console\Commands\CacheMarkdown;
use Illuminate\Support\Facades\Schedule;

Schedule::command(CacheMarkdown::class)->hourly();
