<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Proto/rpc.proto

namespace Etcd;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>etcdserverpb.WatchRequest</code>
 */
class WatchRequest extends \Google\Protobuf\Internal\Message
{
    protected $request_union;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Etcd\WatchCreateRequest $create_request
     *     @type \Etcd\WatchCancelRequest $cancel_request
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.WatchCreateRequest create_request = 1;</code>
     * @return \Etcd\WatchCreateRequest|null
     */
    public function getCreateRequest()
    {
        return $this->readOneof(1);
    }

    public function hasCreateRequest()
    {
        return $this->hasOneof(1);
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.WatchCreateRequest create_request = 1;</code>
     * @param \Etcd\WatchCreateRequest $var
     * @return $this
     */
    public function setCreateRequest($var)
    {
        GPBUtil::checkMessage($var, \Etcd\WatchCreateRequest::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.WatchCancelRequest cancel_request = 2;</code>
     * @return \Etcd\WatchCancelRequest|null
     */
    public function getCancelRequest()
    {
        return $this->readOneof(2);
    }

    public function hasCancelRequest()
    {
        return $this->hasOneof(2);
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.WatchCancelRequest cancel_request = 2;</code>
     * @param \Etcd\WatchCancelRequest $var
     * @return $this
     */
    public function setCancelRequest($var)
    {
        GPBUtil::checkMessage($var, \Etcd\WatchCancelRequest::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestUnion()
    {
        return $this->whichOneof("request_union");
    }

}

