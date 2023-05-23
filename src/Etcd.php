<?php

declare(strict_types=1);

namespace S1lver\Etcd;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use JsonException;
use S1lver\Etcd\Rest\AuthenticateResponse;
use S1lver\Etcd\Rest\RangeResponse;
use Yii;
use yii\base\Component;

/**
 * Yii2 etcd component
 *
 * @property-read array[] $tokenOptions
 * @property-read string $version
 */
class Etcd extends Component
{
    private const ETCD_VERSION = '/v3';

    public string $host = '';
    public string $user = '';
    public string $password = '';
    /**
     * @var array guzzle client options
     */
    public array $clientOptions = [];

    private Client $client;

    /**
     * @inheritDoc
     */
    public function init(): void
    {
        parent::init();

        $this->client = new Client($this->clientOptions);
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
        $options = [
            RequestOptions::BODY => json_encode(['key' => trim(base64_encode($key))], JSON_THROW_ON_ERROR),
        ];
        $response = $this->client->post(
            $this->host.self::ETCD_VERSION.EtcdEndpoint::RANGE,
            array_merge($options, $this->getTokenOptions())
        );

        return new RangeResponse(json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR));
    }

    /**
     * Get all keys prefixed with "foo" ($key = foo, $rangeEnd = fop)
     *
     * @param string $key
     * @param string $rangeEnd
     * @return RangeResponse
     * @throws GuzzleException|JsonException
     */
    public function getRange(string $key, string $rangeEnd): RangeResponse
    {
        $options = [
            RequestOptions::BODY => json_encode(
                ['key' => trim(base64_encode($key)), 'range_end' => trim(base64_encode($rangeEnd))],
                JSON_THROW_ON_ERROR
            ),
        ];

        $response = $this->client->post(
            $this->host.self::ETCD_VERSION.EtcdEndpoint::RANGE,
            array_merge($options, $this->getTokenOptions())
        );

        return new RangeResponse(json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR));
    }

    public function put(string $key, string $value): bool
    {
        $options = [
            RequestOptions::BODY => json_encode(
                ['key' => base64_encode(trim($key)), 'value' => base64_encode(trim($value))],
                JSON_THROW_ON_ERROR
            ),
        ];
        $response = $this->client->post(
            $this->host.self::ETCD_VERSION.EtcdEndpoint::PUT,
            array_merge($options, $this->getTokenOptions())
        );

        return 200 === $response->getStatusCode();
    }

    /**
     * @return AuthenticateResponse
     * @throws GuzzleException|JsonException
     */
    public function authenticate(): AuthenticateResponse
    {
        $content = json_encode(['header' => [], 'token' => ''], JSON_THROW_ON_ERROR);

        try {
            $response = $this->client->post(
                $this->host.self::ETCD_VERSION.EtcdEndpoint::AUTHENTICATE,
                [
                    RequestOptions::BODY => json_encode(
                        ['name' => $this->user, 'password' => $this->password],
                        JSON_THROW_ON_ERROR
                    ),
                ]
            );
            $content = $response->getBody()->getContents();
        } catch (ClientException $exception) {
            Yii::warning($exception);
        }

        return new AuthenticateResponse(json_decode($content, true, 512, JSON_THROW_ON_ERROR));
    }

    /**
     * @return array|array[]
     * @throws GuzzleException|JsonException
     */
    private function getTokenOptions(): array
    {
        $token = $this->authenticate()->token;

        return empty($token)
            ?[]
            :[
                RequestOptions::HEADERS => ['Authorization' => $token],
            ];
    }
}
