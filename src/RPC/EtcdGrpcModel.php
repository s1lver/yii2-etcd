<?php

declare(strict_types=1);

namespace S1lver\Etcd\RPC;

use Etcd\KVClient;
use Etcd\PutRequest;
use Etcd\RangeRequest;
use Grpc\ChannelCredentials;
use S1lver\Etcd\EtcdServiceInterface;
use S1lver\Etcd\Exceptions\EtcdException;
use S1lver\Etcd\Rest\RangeResponse;
use const Grpc\STATUS_OK;

class EtcdGrpcModel implements EtcdServiceInterface
{
    public string $host = '';
    public string $user = '';
    public string $password = '';
    public array $clientOptions = [];

    private KVClient $client;

    /**
     * @param string $host
     * @param string $user
     * @param string $password
     * @param array $clientOptions
     */
    public function __construct(string $host, string $user, string $password, array $clientOptions)
    {
        if (!extension_loaded('grpc') || !extension_loaded('protobuf')) {
            throw new EtcdException('Not install protobuf or grpc extensions');
        }

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->clientOptions = $clientOptions;

        $this->client = $this->getClient();
    }

    public function getVersion(): string
    {
        return 'Not supported';
    }

    public function getRange(string $key, string $rangeEnd): RangeResponse
    {
        $request = new RangeRequest();
        $request->setKey($key);
        $request->setRangeEnd($rangeEnd);

        /** @var \Etcd\RangeResponse $response */
        [$response, $status] = $this->client->Range($request)->wait();

        if (STATUS_OK !== $status) {
            throw new EtcdException('');
        }
    }

    public function getKey(string $key): RangeResponse
    {
        $request = new RangeRequest();
        $request->setKey($key);

        /** @var \Etcd\RangeResponse $response */
        [$response, $status] = $this->client->Range($request)->wait();

        if (STATUS_OK !== $status) {
            throw new EtcdException('');
        }

        $response->getKvs();
    }

    public function put(string $key, string $value): bool
    {
        $request = new PutRequest();
        $request->setKey($key);
        $request->setValue($value);

        [$response, $status] = $this->client->Put($request)->wait();

        return STATUS_OK === $status;
    }

    private function getClient(): KVClient
    {
        return new KVClient($this->host, [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);
    }
}
