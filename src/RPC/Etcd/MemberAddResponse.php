<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Proto/rpc.proto

namespace Etcd;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>etcdserverpb.MemberAddResponse</code>
 */
class MemberAddResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.etcdserverpb.ResponseHeader header = 1;</code>
     */
    protected $header = null;
    /**
     * Generated from protobuf field <code>.etcdserverpb.Member member = 2;</code>
     */
    protected $member = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Etcd\ResponseHeader $header
     *     @type \Etcd\Member $member
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.ResponseHeader header = 1;</code>
     * @return \Etcd\ResponseHeader
     */
    public function getHeader()
    {
        return $this->header;
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
     * Generated from protobuf field <code>.etcdserverpb.Member member = 2;</code>
     * @return \Etcd\Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Generated from protobuf field <code>.etcdserverpb.Member member = 2;</code>
     * @param \Etcd\Member $var
     * @return $this
     */
    public function setMember($var)
    {
        GPBUtil::checkMessage($var, \Etcd\Member::class);
        $this->member = $var;

        return $this;
    }

}

