<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Proto/rpc.proto

namespace Etcd;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>etcdserverpb.HashResponse</code>
 */
class HashResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.etcdserverpb.ResponseHeader header = 1;</code>
     */
    protected $header = null;
    /**
     * Generated from protobuf field <code>uint32 hash = 2;</code>
     */
    protected $hash = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Etcd\ResponseHeader $header
     *     @type int $hash
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.ResponseHeader header = 1;</code>
     * @return \Etcd\ResponseHeader|null
     */
    public function getHeader()
    {
        return $this->header;
    }

    public function hasHeader()
    {
        return isset($this->header);
    }

    public function clearHeader()
    {
        unset($this->header);
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.ResponseHeader header = 1;</code>
     * @param \Etcd\ResponseHeader $var
     * @return $this
     */
    public function setHeader($var)
    {
        GPBUtil::checkMessage($var, \Etcd\ResponseHeader::class);
        $this->header = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 hash = 2;</code>
     * @return int
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Generated from protobuf field <code>uint32 hash = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setHash($var)
    {
        GPBUtil::checkUint32($var);
        $this->hash = $var;

        return $this;
    }

}

