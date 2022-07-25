<?php

declare(strict_types=1);

namespace HttpPHP\Headers\Contracts;

interface HeaderContract
{
    /**
     * @param string $key
     * @param mixed $value
     * @return HeaderContract
     */
    public static function make(string $key, mixed $value): HeaderContract;

    /**
     * @return string
     */
    public function key(): string;

    /**
     * @return HeaderValueContract
     */
    public function value(): HeaderValueContract;

    /**
     * @return array<string,string>
     */
    public function toHeader(): array;
}
