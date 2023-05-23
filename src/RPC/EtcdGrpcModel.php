<?php

declare(strict_types=1);

namespace S1lver\Etcd\RPC;

use Etcd\KVClient;
use Grpc\ChannelCredentials;
use S1lver\Etcd\EtcdServiceInterface;

class EtcdGrpcModel implements EtcdServiceInterface
{

    private function getClient(string $host)
    {
        return new KVClient($host, [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);
    }
}
