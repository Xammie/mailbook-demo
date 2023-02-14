<?php

use Xammie\Mailbook\Facades\Mailbook;

it('can render all mailables', function (string $locale) {
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

it('can render homepage', function () {
    Http::fake([
        'https://raw.githubusercontent.com/Xammie/mailbook/main/README.md' => Http::response(__DIR__.'/../../vendor/xammie/mailbook/README.md'),
    ]);

    $response = $this->get('/mailbook?locale=de&selected=app%5Cmail%5Cordercreated');

    $response->assertOk();
})
->only();
