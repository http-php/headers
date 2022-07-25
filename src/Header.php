<?php

declare(strict_types=1);

namespace HttpPHP\Headers;

use HttpPHP\Headers\Contracts\HeaderContract;
use HttpPHP\Headers\Contracts\HeaderValueContract;

final class Header implements HeaderContract
{
    /**
     * @param string $key
     * @param HeaderValueContract $value
     */
    public function __construct(
        private readonly string $key,
        private readonly HeaderValueContract $value,
    ) {
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return HeaderContract
     */
    public static function make(string $key, mixed $value): HeaderContract
    {
        return new Header(
            key: $key,
            value: HeaderValue::make(
                value: $value,
            ),
        );
    }

    /**
     * @return string
     */
    public function key(): string
    {
        return $this->key;
    }

    /**
     * @return HeaderValueContract
     */
    public function value(): HeaderValueContract
    {
        return $this->value;
    }

    /**
     * @return array<string,string>
     */
    public function toHeader(): array
    {
        return [
            $this->key() => $this->value()->toString(),
        ];
    }
}
