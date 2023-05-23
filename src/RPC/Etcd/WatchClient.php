<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Etcd;

/**
 */
class WatchClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Watch watches the events happening or happened. Both input and output
     * are stream. One watch rpc can watch for multiple keys or prefixs and
     * get a stream of events. The whole events history can be watched unless
     * compacted.
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\BidiStreamingCall
     */
    public function Watch($metadata = [], $options = []) {
        return $this->_bidiRequest('/etcdserverpb.Watch/Watch',
        ['\Etcd\WatchResponse','decode'],
        $metadata, $options);
    }

}
