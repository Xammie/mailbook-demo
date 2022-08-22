<?php

use Xammie\Mailbook\Facades\Mailbook;

it('can render all mailables', function () {
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
});
