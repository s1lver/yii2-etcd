<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Etcd;

/**
 */
class KVClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Range gets the keys in the range from the store.
     * @param \Etcd\RangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Range(\Etcd\RangeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.KV/Range',
        $argument,
        ['\Etcd\RangeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Put puts the given key into the store.
     * A put request increases the revision of the store,
     * and generates one event in the event history.
     * @param \Etcd\PutRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Put(\Etcd\PutRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.KV/Put',
        $argument,
        ['\Etcd\PutResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete deletes the given range from the store.
     * A delete request increase the revision of the store,
     * and generates one event in the event history.
     * @param \Etcd\DeleteRangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteRange(\Etcd\DeleteRangeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.KV/DeleteRange',
        $argument,
        ['\Etcd\DeleteRangeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Txn processes all the requests in one transaction.
     * A txn request increases the revision of the store,
     * and generates events with the same revision in the event history.
     * It is not allowed to modify the same key several times within one txn.
     * @param \Etcd\TxnRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Txn(\Etcd\TxnRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.KV/Txn',
        $argument,
        ['\Etcd\TxnResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Compact compacts the event history in etcd. User should compact the
     * event history periodically, or it will grow infinitely.
     * @param \Etcd\CompactionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Compact(\Etcd\CompactionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.KV/Compact',
        $argument,
        ['\Etcd\CompactionResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Hash returns the hash of local KV state for consistency checking purpose.
     * This is designed for testing purpose. Do not use this in production when there
     * are ongoing transactions.
     * @param \Etcd\HashRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Hash(\Etcd\HashRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.KV/Hash',
        $argument,
        ['\Etcd\HashResponse', 'decode'],
        $metadata, $options);
    }

}
