<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Etcd;

/**
 */
class LeaseClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * LeaseCreate creates a lease. A lease has a TTL. The lease will expire if the
     * server does not receive a keepAlive within TTL from the lease holder.
     * All keys attached to the lease will be expired and deleted if the lease expires.
     * The key expiration generates an event in event history.
     * @param \Etcd\LeaseCreateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LeaseCreate(\Etcd\LeaseCreateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Lease/LeaseCreate',
        $argument,
        ['\Etcd\LeaseCreateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * LeaseRevoke revokes a lease. All the key attached to the lease will be expired and deleted.
     * @param \Etcd\LeaseRevokeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LeaseRevoke(\Etcd\LeaseRevokeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Lease/LeaseRevoke',
        $argument,
        ['\Etcd\LeaseRevokeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * KeepAlive keeps the lease alive.
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\BidiStreamingCall
     */
    public function LeaseKeepAlive($metadata = [], $options = []) {
        return $this->_bidiRequest('/etcdserverpb.Lease/LeaseKeepAlive',
        ['\Etcd\LeaseKeepAliveResponse','decode'],
        $metadata, $options);
    }

}
