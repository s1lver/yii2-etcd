<?php

declare(strict_types=1);

namespace S1lver\Etcd\Rest;

use yii\base\BaseObject;

class AuthenticateResponse extends BaseObject
{
    public array $header = [];
    public string $token = '';
}
