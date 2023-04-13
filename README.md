# Yii2 etcd component

https://etcd.io

## Required

- PHP: >= 8.1
- grpc - for RPC
- protobuf - for RPC

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


## How to use

Configure

```php
$config = [
    'components' => [
        'etcd' => [
            'class' => \S1lver\Etcd\Etcd::class,
            'host' => 'etcd:2379',
        ],
    ],
];
```

Get key value
```php
Yii::$app->etcd->getKey('hello');

// {"header":{"cluster_id":"14841639068965178418","member_id":"10276657743932975437","revision":"3","raft_term":"4"},"kvs":[{"key":"hello","create_revision":"3","mod_revision":"3","version":"1","value":"aGVsbG8="}],"count":"1"}
```

Get etcd version

```php
Yii::$app->etcd->version;

// {"etcdserver":"3.5.8","etcdcluster":"3.5.0"}
```
