<?php

declare(strict_types=1);

use HttpPHP\Headers\Collection;
use HttpPHP\Headers\Header;

it('can create an empty collection', function () {
    expect(
        new Collection(),
    )->toBeInstanceOf(Collection::class)->items->toBeArray()->toBeEmpty();
});

it('can create a collection with a new header', function () {
    expect(
        new Collection(
            items: [Header::make(
                key: 'test',
                value: 'test',
            )],
        ),
    )->toBeInstanceOf(Collection::class)->items->toBeArray();
});

it('can add a new header to a collection', function () {
    $collection = new Collection();

    expect(
        $collection->add(
            header: Header::make(
                key: 'test',
                value: 'test',
            ),
        ),
    )->toBeInstanceOf(Collection::class)
        ->items->toBeArray()->toHaveCount(1);
});

it('can check if a collection has a header', function () {
    $collection = new Collection(
        items: [
            Header::make(
                key: 'test',
                value: 'test',
            ),
        ],
    );

    expect(
        $collection->has(
            value: 'test',
        ),
    )->toBeBool()->toBeTrue();
});
