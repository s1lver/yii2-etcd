<?php

declare(strict_types=1);

namespace S1lver\Etcd\Rest;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use S1lver\Etcd\EtcdEndpoint;
use S1lver\Etcd\EtcdServiceInterface;
use Yii;
use JsonException;

class EtcdRestModel implements EtcdServiceInterface
{
    public string $host = '';
    public string $user = '';
    public string $password = '';
    private Client $client;

    /**
     * @param string $host
     * @param string $user
     * @param string $password
     * @param array $clientOptions
     */
    public function __construct(string $host, string $user, string $password, array $clientOptions)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->client = new Client($clientOptions);
    }

    public function getKey(string $key): RangeResponse
    {
        $options = [
            RequestOptions::BODY => json_encode(['key' => trim(base64_encode($key))], JSON_THROW_ON_ERROR),
        ];
        $response = $this->client->post(
            $this->host.EtcdEndpoint::ETCD_VERSION.EtcdEndpoint::RANGE,
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
            $this->host.EtcdEndpoint::ETCD_VERSION.EtcdEndpoint::RANGE,
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
            $this->host.EtcdEndpoint::ETCD_VERSION.EtcdEndpoint::PUT,
            array_merge($options, $this->getTokenOptions())
        );

        return 200 === $response->getStatusCode();
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

    /**
     * @return AuthenticateResponse
     * @throws GuzzleException|JsonException
     */
    public function authenticate(): AuthenticateResponse
    {
        $content = json_encode(['header' => [], 'token' => ''], JSON_THROW_ON_ERROR);

        try {
            $response = $this->client->post(
                $this->host.EtcdEndpoint::ETCD_VERSION.EtcdEndpoint::AUTHENTICATE,
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
}
