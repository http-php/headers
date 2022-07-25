<?php

declare(strict_types=1);

use HttpPHP\Headers\Contracts\HeaderValueContract;
use HttpPHP\Headers\Exceptions\InvalidTypeException;
use HttpPHP\Headers\HeaderValue;

use function PHPUnit\Framework\assertSame;

it('can create a new header value', function () {
    expect(
        new HeaderValue(
            value: 'test',
        ),
    )->toBeInstanceOf(HeaderValueContract::class)
        ->toString()->toBeString()->toEqual('test');
});

it('can statically make a new header value', function () {
    expect(
        HeaderValue::make(
            value: 'test',
        ),
    )->toBeInstanceOf(HeaderValueContract::class)
        ->toString()->toBeString()->toEqual('test');
});

it('can add an integer to a header', function () {
    expect(
        HeaderValue::make(
            value: 12,
        ),
    )->toString()->toEqual('12');
});

it('can add a boolean to a header', function () {
    expect(
        HeaderValue::make(
            value: true,
        ),
    )->toString()->toEqual('1');
});

it('can add an array to a header', function () {
    expect(
        HeaderValue::make(
            value: ['test' => 'test'],
        ),
    )->toString()->toEqual('{"test":"test"}');
});

it('can add a float to a header', function () {
    expect(
        HeaderValue::make(
            value: 1.1,
        ),
    )->toString()->toEqual('1.1');
});

it('can add an anonymous class to a header', function () {
    $header = HeaderValue::make(
        value: fn () => 'test',
    );

    assertSame(
        'test',
        $header->toString(),
    );
});

it('throws an exception for an unsupported type', function () {
    $header = HeaderValue::make(
        value: new class () {},
    );

    $header->toString();
})->throws(InvalidTypeException::class);
