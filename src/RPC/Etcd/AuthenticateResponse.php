<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Proto/rpc.proto

namespace Etcd;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>etcdserverpb.AuthenticateResponse</code>
 */
class AuthenticateResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.etcdserverpb.ResponseHeader header = 1;</code>
     */
    protected $header = null;
    /**
     * token is an authorized token that can be used in succeeding RPCs
     *
     * Generated from protobuf field <code>string token = 2;</code>
     */
    protected $token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Etcd\ResponseHeader $header
     *     @type string $token
     *           token is an authorized token that can be used in succeeding RPCs
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
     * token is an authorized token that can be used in succeeding RPCs
     *
     * Generated from protobuf field <code>string token = 2;</code>
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * token is an authorized token that can be used in succeeding RPCs
     *
     * Generated from protobuf field <code>string token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->token = $var;

        return $this;
    }

}

