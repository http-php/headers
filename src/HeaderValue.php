<?php

declare(strict_types=1);

namespace HttpPHP\Headers;

use HttpPHP\Headers\Contracts\HeaderValueContract;
use HttpPHP\Headers\Exceptions\InvalidTypeException;

final class HeaderValue implements HeaderValueContract
{
    /**
     * @param mixed $value
     */
    public function __construct(
        private readonly mixed $value,
    ) {
    }

    /**
     * @param mixed $value
     * @return HeaderValueContract
     */
    public static function make(mixed $value): HeaderValueContract
    {
        return new HeaderValue(
            value: $value,
        );
    }

    /**
     * @return string
     * @throws InvalidTypeException
     */
    public function toString(): string
    {
        if (is_array($this->value)) {
            return strval(json_encode(
                value: $this->value,
            ));
        }

        if (is_string($this->value)) {
            return $this->value;
        }

        if (is_int($this->value)) {
            return strval($this->value);
        }

        if (is_float($this->value)) {
            return strval($this->value);
        }

        if (is_bool($this->value)) {
            return strval($this->value);
        }

        if (is_callable($this->value)) {
            $callable = $this->value;

            return strval($callable());
        }

        $type = gettype($this->value);

        throw new InvalidTypeException(
            message: "Currently [$type] is not a supported header type.",
        );
    }
}
