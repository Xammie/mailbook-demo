@component('mail::message')
# Welcome to Mailbook

Mailbook is a Laravel package that lets you easily inspect your mails without having to actually trigger it in your application.
It is inspired by [storybook](https://storybook.js.org/).

You can install the package with

<x-markdown theme="github-dark">
```bash
composer require --dev xammie/mailbook
```
</x-markdown>

Before you can view transactional emails in the mailbook you have to register them.

<x-markdown theme="github-dark">
```php
// This will use dependency injection if your mailable has parameters
Mailbook::add(VerificationMail::class);

// Use a closure to customize the parameters of the mail instance
Mailbook::add(function () {
    $user = User::factory()->make();

    return new VerificationMail($user, '/example/url')
});

// You can also use dependency injection in the closure
Mailbook::add(function (User $user) {
    return new VerificationMail($user, '/example/url');
});
```
</x-markdown>

@component('mail::button', ['url' => 'https://github.com/Xammie/mailbook'])
View on Github
@endcomponent

Enjoy,<br>
Max
@endcomponent
