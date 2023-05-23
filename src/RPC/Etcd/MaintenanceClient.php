<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Etcd;

/**
 */
class MaintenanceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * TODO: move Hash from kv to Maintenance
     * @param \Etcd\DefragmentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Defragment(\Etcd\DefragmentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Maintenance/Defragment',
        $argument,
        ['\Etcd\DefragmentResponse', 'decode'],
        $metadata, $options);
    }

}
