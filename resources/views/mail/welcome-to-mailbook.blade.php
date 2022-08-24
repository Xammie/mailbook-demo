@component('mail::message')
# Welcome to Mailbook

Mailbook is a Laravel package that lets you easily inspect your mails without having to actually trigger it in your application.
It is inspired by [storybook](https://storybook.js.org/).

You can switch emails by using the navigation on the left. At the top bar you can view the emails subject.

@component('mail::button', ['url' => 'https://github.com/Xammie/mailbook'])
View on GitHub
@endcomponent

<x-markdown theme="github-dark">
## Installation

You can install the package via composer:

```bash
composer require --dev xammie/mailbook
```

Next install mailbook into your application

```bash
php artisan mailbook:install
```

## Usage

Before you can view transactional emails in the mailbook you have to register them.

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

Next head over to `/mailbook` to preview the mailables.
</x-markdown>

@component('mail::button', ['url' => 'https://github.com/Xammie/mailbook#readme'])
    Documentation
@endcomponent

Enjoy,<br>
Max
@endcomponent
