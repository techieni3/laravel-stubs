# Laravel Stubs

This repo contains opinionated versions of the Laravel default stubs, feel free to modify after publishing.

## Installation

You can install this package using composer:

```bash
composer require --dev techieni3/laravel-stubs
```

If you want to make sure these stubs stay up to date with every update, add this composer hook to your `composer.json` file:

```json
"scripts": {
    "post-update-cmd": [
        "@php artisan publish:stubs --force"
    ]
}
```

## Usage

You can publish the stubs using this command:

```bash
php artisan publish:stubs
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you've found a bug regarding security please mail [niteen1593@gmail.com](mailto:niteen1593@gmail.com) instead of using the issue tracker.

## License

The MIT License (MIT). Please see License File for more information.
