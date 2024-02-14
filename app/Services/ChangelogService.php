<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ChangelogService
{
    public function retrieve(): string
    {
        return Cache::rememberForever('mailbook-changelog', fn (): string => $this->fetch());
    }

    public function fetch(): string
    {
        return Http::get('https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md')->body();
    }

    public function fresh(): string
    {
        $result = $this->fetch();

        Cache::set('mailbook-changelog', $result);

        return $this->retrieve();
    }
}
