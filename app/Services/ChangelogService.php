<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ChangelogService
{
    public function retrieve(): string
    {
        return Cache::rememberForever('mailbook-changelog', fn () => $this->fetch());
    }

    public function fetch(): string
    {
        return Http::get('https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md')->body();
    }

    public function fresh(): string
    {
        Cache::forget('mailbook-changelog');

        return $this->retrieve();
    }
}
