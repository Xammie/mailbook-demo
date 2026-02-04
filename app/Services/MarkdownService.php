<?php

declare(strict_types=1);

namespace App\Services;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;
use Tempest\Highlight\CommonMark\CodeBlockRenderer;
use Tempest\Highlight\CommonMark\InlineCodeBlockRenderer;
use Tempest\Highlight\Highlighter;
use Tempest\Highlight\Themes\InlineTheme;

class MarkdownService
{
    public function render(string $markdown): string
    {
        $config = [
            'external_link' => [
                'internal_hosts' => [],
                'open_in_new_window' => true,
            ],
        ];

        $highlighter = new Highlighter(new InlineTheme(base_path('/vendor/tempest/highlight/src/Themes/Css/dracula.css')));
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension);
        $environment->addExtension(new ExternalLinkExtension);
        $environment->addExtension(new GithubFlavoredMarkdownExtension);
        $environment->addRenderer(FencedCode::class, new CodeBlockRenderer($highlighter));
        $environment->addRenderer(Code::class, new InlineCodeBlockRenderer($highlighter));

        $markdownConverter = new MarkdownConverter(environment: $environment);

        return $markdownConverter->convert($markdown)->getContent();
    }
}
