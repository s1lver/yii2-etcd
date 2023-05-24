<?php

declare(strict_types=1);

namespace S1lver\Etcd;

interface EtcdRangeResponseInterface
{
    public function getFirstKeyValue(): string;
}
