<?php

declare(strict_types=1);

namespace HttpPHP\Headers\Contracts;

interface HeaderCollectionContract
{
    /**
     * @param HeaderContract $header
     * @return HeaderCollectionContract
     */
    public function add(HeaderContract $header): HeaderCollectionContract;

    /**
     * @param string $value
     * @return bool
     */
    public function has(string $value): bool;

    /**
     * @param array<int, array<string,string>> $array
     * @return array<int|string, mixed>
     */
    public function flatten(array $array): array;

    /**
     * @return array<int,array<string,string>>
     */
    public function toArray(): array;
}
