<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;
use Xammie\Mailbook\Facades\Mailbook;

final class MailbookTest extends TestCase
{
    public function test_can_render_mailbook(): void
    {
        Http::fake([
            'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
        ]);

        $this->get('/mailbook')->assertOk();
    }

    #[DataProvider('localeProvider')]
    public function test_can_render_all_mailables(string $locale): void
    {
        Http::fake([
            'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
            'https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/CHANGELOG.md'),
        ]);

        Mailbook::setLocale($locale);

        $mails = Mailbook::mailables();
        $this->assertNotEmpty($mails);

        foreach ($mails as $mail) {
            $this->assertNotEmpty($mail->content());

            if ($mail->hasVariants()) {
                $variants = $mail->getVariants();

                foreach ($variants as $variant) {
                    $mail->selectVariant($variant->slug);
                    $this->assertNotEmpty($mail->content());
                }
            }
        }
    }

    public static function localeProvider(): Iterator
    {
        yield ['en'];
        yield ['nl'];
        yield ['de'];
    }

    public function test_can_render_homepage(): void
    {
        Http::fake([
            'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
        ]);

        $response = $this->get('/mailbook?locale=de&selected=app%5Cmail%5Cordercreated');

        $response->assertOk();
    }

    public function test_will_redirect(): void
    {
        $this->get('/')->assertRedirect('/mailbook');
    }
}
