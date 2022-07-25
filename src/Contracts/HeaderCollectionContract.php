<?php

declare(strict_types=1);

namespace HttpPHP\Headers\Contracts;

interface HeaderCollectionContract
{
    public function add(HeaderContract $header): HeaderCollectionContract;

    public function has(string $value): bool;

    public function toArray(): array;
}
