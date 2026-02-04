<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ReadmeService
{
    public function __construct(
        private readonly MarkdownService $markdown,
    ) {}

    public function render(): string
    {
        $content = str($this->retrieve())
            ->replace('# Mailbook', '# Welcome to Mailbook')
            ->replace('![Example screenshot](./screenshot.png)', '')
            ->replace('<p align="center"><a href="https://mailbook.dev/">View demo</a></p>', '')
            ->toString();

        return $this->markdown->render($content);
    }

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

        return $result;
    }
}
