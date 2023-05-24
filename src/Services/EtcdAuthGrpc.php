<?php

declare(strict_types=1);

namespace S1lver\Etcd\Services;

use Etcd\AuthClient;
use Etcd\AuthenticateRequest;
use Grpc\ChannelCredentials;
use S1lver\Etcd\Exceptions\EtcdException;
use const Grpc\STATUS_OK;

class EtcdAuthGrpc implements EtcdAuthInterface
{
    public string $host = '';

    private AuthClient $client;

    public function __construct(string $host)
    {
        $this->host = $host;

        $this->client = $this->getClient();
    }

    public function authenticate(): string
    {
        [$response, $status] = $this->client->Authenticate(new AuthenticateRequest());

        if (STATUS_OK !== $status->code) {
            throw new EtcdException('Error');
        }

        return '';
    }

    public function getClient(): AuthClient
    {
        return new AuthClient($this->host, [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);
    }
}
