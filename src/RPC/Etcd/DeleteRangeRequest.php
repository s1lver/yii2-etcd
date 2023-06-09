<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Proto/rpc.proto

namespace Etcd;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>etcdserverpb.DeleteRangeRequest</code>
 */
class DeleteRangeRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * if the range_end is not given, the request deletes the key.
     *
     * Generated from protobuf field <code>bytes key = 1;</code>
     */
    protected $key = '';
    /**
     * if the range_end is given, it deletes the keys in range [key, range_end).
     *
     * Generated from protobuf field <code>bytes range_end = 2;</code>
     */
    protected $range_end = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $key
     *           if the range_end is not given, the request deletes the key.
     *     @type string $range_end
     *           if the range_end is given, it deletes the keys in range [key, range_end).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * if the range_end is not given, the request deletes the key.
     *
     * Generated from protobuf field <code>bytes key = 1;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * if the range_end is not given, the request deletes the key.
     *
     * Generated from protobuf field <code>bytes key = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, False);
        $this->key = $var;

        return $this;
    }

    /**
     * if the range_end is given, it deletes the keys in range [key, range_end).
     *
     * Generated from protobuf field <code>bytes range_end = 2;</code>
     * @return string
     */
    public function getRangeEnd()
    {
        return $this->range_end;
    }

    /**
     * if the range_end is given, it deletes the keys in range [key, range_end).
     *
     * Generated from protobuf field <code>bytes range_end = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRangeEnd($var)
    {
        GPBUtil::checkString($var, False);
        $this->range_end = $var;

        return $this;
    }

}

