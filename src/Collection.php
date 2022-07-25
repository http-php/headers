<?php

declare(strict_types=1);

namespace HttpPHP\Headers;

use HttpPHP\Headers\Contracts\HeaderCollectionContract;
use HttpPHP\Headers\Contracts\HeaderContract;

final class Collection implements HeaderCollectionContract
{
    /**
     * @param array<int,HeaderContract> $items
     */
    public function __construct(
        public array $items = [],
    ) {
    }

    /**
     * @param HeaderContract $header
     * @return $this
     */
    public function add(HeaderContract $header): HeaderCollectionContract
    {
        $this->items[] = $header;

        return $this;
    }

    /**
     * @param array<int, array<string,string>> $array
     * @return array<int|string, mixed>
     */
    public function flatten(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge(
                    $result,
                    $value,
                );
            } else {
                $result = array_merge(
                    $result,
                    [$key => $value],
                );
            }
        }

        return $result;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function has(string $value): bool
    {
        return in_array(
            needle: $value,
            haystack: $this->flatten(
                array: $this->toArray(),
            ),
        );
    }

    /**
     * @return array<int,array<string,string>>
     */
    public function toArray(): array
    {
        return array_map(
            callback: fn ($item): array => $item->toHeader(),
            array: $this->items,
        );
    }
}
