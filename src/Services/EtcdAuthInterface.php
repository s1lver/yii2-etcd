<?php

declare(strict_types=1);

namespace S1lver\Etcd\Services;

interface EtcdAuthInterface
{
    public function authenticate(): string;
}
