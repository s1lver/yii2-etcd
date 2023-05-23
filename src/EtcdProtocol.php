<?php

declare(strict_types=1);

namespace S1lver\Etcd;

/**
 * Supported protocol for gateway
 */
final class EtcdProtocol
{
    public const HTTP = 'http';

    public const GRPC = 'grpc';
}
