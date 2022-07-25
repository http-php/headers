<?php

declare(strict_types=1);

use HttpPHP\Headers\Contracts\HeaderContract;
use HttpPHP\Headers\Contracts\HeaderValueContract;
use HttpPHP\Headers\Header;
use HttpPHP\Headers\HeaderValue;

it('can construct a new header', function () {
    $header = new Header(
        key: 'string',
        value: new HeaderValue(
            value: 'test',
        ),
    );

    expect(
        $header,
    )->toBeInstanceOf(HeaderContract::class)
        ->key()->toBeString()->toEqual('string')
        ->value()->toBeInstanceOf(HeaderValueContract::class);
});

it('can statically make a new header', function () {
    expect(
        Header::make(
            key: 'string',
            value: 'string',
        ),
    )->toBeInstanceOf(HeaderContract::class)
        ->key()->toBeString()->toEqual('string')
        ->value()->toBeInstanceOf(HeaderValueContract::class);
});

it('can turn a header into a header array', function () {
    $header = Header::make(
        key: 'test',
        value: 'test',
    );

    expect(
        $header->toHeader(),
    )->toBeArray()->toEqual(['test' => 'test']);
});
