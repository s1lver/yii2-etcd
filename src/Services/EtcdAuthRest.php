<?php

declare(strict_types=1);

namespace S1lver\Etcd\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use JsonException;
use S1lver\Etcd\EtcdEndpoint;
use S1lver\Etcd\Rest\AuthenticateResponse;
use Yii;

class EtcdAuthRest implements EtcdAuthInterface
{
    public string $host = '';
    public string $user = '';
    public string $password = '';
    public Client $client;

    public function __construct(string $host, string $user, string $password, Client $client)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;

        $this->client = $client;
    }

    /**
     * @return string
     * @throws GuzzleException|JsonException
     */
    public function authenticate(): string
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

        return (new AuthenticateResponse(json_decode($content, true, 512, JSON_THROW_ON_ERROR)))->token;
    }
}
