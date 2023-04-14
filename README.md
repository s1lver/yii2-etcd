# Yii2 etcd component

https://etcd.io

## Required

- PHP: >= 8.0
- grpc - for RPC (in developing)
- protobuf - for RPC (in developing)

## Install

```bash
composer require s1lver/yii2-etcd "^1.0.0"
```

or add

```
"s1lver/yii2-etcd": "^1.0.0"
```

to the require section of your composer.json file.

## Supported etcd API version

- v3

## Supported etcd methods

- `version`
- `range`
- `put`
- `authenticate`


## How to use

Configure

```php
$config = [
    'components' => [
        'etcd' => [
            'class' => \S1lver\Etcd\Etcd::class,
            'host' => 'etcd:2379',
            'user' => 'username',
            'password' => 'password',
        ],
    ],
];
```

Get key value
```php
Yii::$app->etcd->getKey('hello')->firstKeyValue;

// Hello
```

Get etcd version

```php
Yii::$app->etcd->version;

// {"etcdserver":"3.5.8","etcdcluster":"3.5.0"}
```
