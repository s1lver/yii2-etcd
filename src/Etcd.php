<?php

declare(strict_types=1);

namespace S1lver\Etcd;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use JsonException;
use S1lver\Etcd\Rest\AuthenticateResponse;
use S1lver\Etcd\Rest\RangeResponse;
use yii\base\Component;

/**
 * Yii2 etcd component
 *
 * @property-read string $version
 */
class Etcd extends Component
{
    private const ETCD_VERSION = '/v3';

    public string $host = '';
    public string $user = '';
    public string $password = '';

    private Client $client;

    /**
     * @inheritDoc
     */
    public function init(): void
    {
        parent::init();

        $this->client = new Client();
    }

    /**
     * @return string
     * @throws GuzzleException
     */
    public function getVersion(): string
    {
        $response = $this->client->get($this->host.EtcdEndpoint::VERSION);

        return $response->getBody()->getContents();
    }

    /**
     * @param string $key
     * @return RangeResponse
     * @throws GuzzleException|JsonException
     */
    public function getKey(string $key): RangeResponse
    {
        $response = $this->client->post(
            $this->host.self::ETCD_VERSION.EtcdEndpoint::RANGE,
            [
                RequestOptions::BODY => json_encode(['key' => $key], JSON_THROW_ON_ERROR),
                RequestOptions::HEADERS => ['Authorization' => $this->authenticate()->token]
            ]
        );

        return new RangeResponse(json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR));
    }

    public function put(string $key, string $value): bool
    {
        $response = $this->client->post(
            $this->host.self::ETCD_VERSION.EtcdEndpoint::PUT,
            [
                RequestOptions::BODY => json_encode(
                    ['key' => $key, 'value' => base64_encode($value)],
                    JSON_THROW_ON_ERROR
                ),
            ]
        );

        return 200 === $response->getStatusCode();
    }

    /**
     * @return AuthenticateResponse
     * @throws GuzzleException|JsonException
     */
    public function authenticate(): AuthenticateResponse
    {
        $response = $this->client->post(
            $this->host.self::ETCD_VERSION.EtcdEndpoint::AUTHENTICATE,
            [
                RequestOptions::BODY => json_encode(
                    ['name' => $this->user, 'password' => $this->password],
                    JSON_THROW_ON_ERROR
                ),
            ]
        );

        return new AuthenticateResponse(json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR));
    }
}
