<?php

declare(strict_types=1);

use Xammie\Mailbook\Facades\Mailbook;

use function Pest\Laravel\get;

it('can render mailbook', function (): void {
    Http::fake([
        'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
    ]);

    get('/mailbook')->assertOk();
});

it('can render all mailables', function (string $locale): void {
    Http::fake([
        'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
        'https://raw.githubusercontent.com/Xammie/mailbook/main/CHANGELOG.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/CHANGELOG.md'),
    ]);

    Mailbook::setLocale($locale);

    $mails = Mailbook::mailables();

    expect($mails)->isNotEmpty();

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
})
    ->with([
        'en',
        'nl',
        'de',
    ]);

it('can render homepage', function (): void {
    Http::fake([
        'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
    ]);

    $response = $this->get('/mailbook?locale=de&selected=app%5Cmail%5Cordercreated');

    $response->assertOk();
});

it('will redirect')
    ->get('/')
    ->assertRedirect('/mailbook');
