# Headers

<!-- BADGES_START -->
[![Latest Version][badge-release]][packagist]
[![PHP Version][badge-php]][php]
![tests](https://github.com/http-php/headers/workflows/tests/badge.svg)
[![Total Downloads][badge-downloads]][downloads]

[badge-release]: https://img.shields.io/packagist/v/http-php/headers.svg?style=flat-square&label=release
[badge-php]: https://img.shields.io/packagist/php-v/http-php/headers.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/http-php/headers.svg?style=flat-square&colorB=mediumvioletred

[packagist]: https://packagist.org/packages/http-php/headers
[php]: https://php.net
[downloads]: https://packagist.org/packages/http-php/headers
<!-- BADGES_END -->

This package is to allow you to create HTTP Headers in PHP, in a simple and reliable way.

## Installation

```bash
composer require http-php/headers
```

## Usage

To use this package, it is very simple. Create a header using the following code:

```php
use HttpPHP\Headers\Header;

$header = Header::make(
    key: 'User-Agent',
    value: 'My-Awesome-Package',
);

$header->toHeader(); // ['User-Agent' => 'My-Awesome-Package'];
```

The package currently supports the following header value types:

- String
- Integer
- Float
- Boolean (although these will return 1 and 0)
- Arrays (these will return json encoded strings)
- Closures

It is important to note that if you pass a closure, that it must return something that can be cast to a string using `strval`.

## Testing

To run the test suite:

```bash
composer run test
```

## Credits

- [Steve McDougall](https://github.com/JustSteveKing)
- [All Contributors](../../contributors)

## LICENSE

The MIT LIcense (MIT). Please see [License File](./LICENSE) for more information.