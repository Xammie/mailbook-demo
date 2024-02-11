<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ReadmeService
{
    public function retrieve(): string
    {
        return Cache::rememberForever('mailbook-readme', fn (): string => $this->fetch());
    }

    public function fetch(): string
    {
        return Http::get('https://raw.githubusercontent.com/Xammie/mailbook/main/README.md')->body();
    }

    public function fresh(): string
    {
        $result = $this->fetch();

        Cache::set('mailbook-readme', $result);

        return $this->retrieve();
    }
}
