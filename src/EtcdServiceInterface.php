<?php

declare(strict_types=1);

namespace S1lver\Etcd;

interface EtcdServiceInterface
{
    public function getKey(string $key): EtcdRangeResponseInterface;

    public function getRange(string $key, string $rangeEnd): EtcdRangeResponseInterface;

    public function put(string $key, string $value): bool;

    public function getVersion(): string;
}
