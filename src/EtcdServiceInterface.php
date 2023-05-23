<?php

declare(strict_types=1);

namespace S1lver\Etcd;

use S1lver\Etcd\Rest\RangeResponse;

interface EtcdServiceInterface
{
    public function getKey(string $key): RangeResponse;

    public function getRange(string $key, string $rangeEnd): RangeResponse;

    public function put(string $key, string $value): bool;

    public function getVersion(): string;
}
