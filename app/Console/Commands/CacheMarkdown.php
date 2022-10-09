<?php

namespace App\Console\Commands;

use App\Services\ChangelogService;
use App\Services\ReadmeService;
use Illuminate\Console\Command;

class CacheMarkdown extends Command
{
    protected $signature = 'markdown:cache';

    protected $description = 'Update the markdown cache';

    public function handle(ReadmeService $readmeService, ChangelogService $changelogService): int
    {
        $this->info('Updating markdown cache...');
        $readmeService->fresh();
        $this->info('Readme updated');
        $changelogService->fresh();
        $this->info('Changelog updated');

        return 0;
    }
}
