<?php

declare(strict_types=1);

namespace S1lver\Etcd;

final class EtcdEndpoint
{
    // Version
    public const ETCD_VERSION = '/v3';

    // Common
    public const VERSION = '/version';

    // KV
    public const PUT = '/kv/put';
    public const RANGE = '/kv/range';

    // Authentication
    public const AUTHENTICATE =  '/auth/authenticate';
}
