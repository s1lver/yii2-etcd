<?php

declare(strict_types=1);

namespace S1lver\Etcd;

use S1lver\Etcd\Services\EtcdAuthInterface;

interface EtcdServiceInterface
{
    public function getKey(string $key): EtcdRangeResponseInterface;

    public function getRange(string $key, string $rangeEnd): EtcdRangeResponseInterface;

    public function put(string $key, string $value): bool;

    public function getVersion(): string;

    public function getAuthModel(): EtcdAuthInterface;
}
