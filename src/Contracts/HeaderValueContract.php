<?php

declare(strict_types=1);

namespace HttpPHP\Headers\Contracts;

interface HeaderValueContract
{
    /**
     * @param mixed $value
     * @return HeaderValueContract
     */
    public static function make(mixed $value): HeaderValueContract;

    /**
     * @return string
     */
    public function toString(): string;
}
