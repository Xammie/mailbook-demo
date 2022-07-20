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

You can register mails in a new service provider.

```php
php artisan make:provider MailbookProvider
```

Make sure to return early if your application is not in debug mode.

```php
public function boot(): void
{
    if (! config('app.debug')) {
        return;
    }

    Mailbook::add(...);
}
```

and register it in `config/app.php`.

```php{5}
'providers' => [
    /*
     * Application Service Providers...
     */
    App\Providers\MailbookProvider::class,
],
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

## Variants

When creating mails you might have a couple of different scenario's that you want to test for one mail, you can use
variants to solve this.

```php
// Use a closure to customize the parameters of the mail instance
Mailbook::add(OrderCreatedMail::class)
    ->variant('1 item', fn () => new OrderCreatedMail(Order::factory()->withOneProduct()->create()))
    ->variant('2 items', fn () => new OrderCreatedMail(Order::factory()->withTwoProducts()->create()));
```
</x-markdown>

Enjoy,<br>
Max
@endcomponent
