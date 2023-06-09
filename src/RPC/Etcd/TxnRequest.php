<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Proto/rpc.proto

namespace Etcd;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * From google paxosdb paper:
 * Our implementation hinges around a powerful primitive which we call MultiOp. All other database
 * operations except for iteration are implemented as a single call to MultiOp. A MultiOp is applied atomically
 * and consists of three components:
 * 1. A list of tests called guard. Each test in guard checks a single entry in the database. It may check
 * for the absence or presence of a value, or compare with a given value. Two different tests in the guard
 * may apply to the same or different entries in the database. All tests in the guard are applied and
 * MultiOp returns the results. If all tests are true, MultiOp executes t op (see item 2 below), otherwise
 * it executes f op (see item 3 below).
 * 2. A list of database operations called t op. Each operation in the list is either an insert, delete, or
 * lookup operation, and applies to a single database entry. Two different operations in the list may apply
 * to the same or different entries in the database. These operations are executed
 * if guard evaluates to
 * true.
 * 3. A list of database operations called f op. Like t op, but executed if guard evaluates to false.
 *
 * Generated from protobuf message <code>etcdserverpb.TxnRequest</code>
 */
class TxnRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.Compare compare = 1;</code>
     */
    private $compare;
    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.RequestUnion success = 2;</code>
     */
    private $success;
    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.RequestUnion failure = 3;</code>
     */
    private $failure;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Etcd\Compare>|\Google\Protobuf\Internal\RepeatedField $compare
     *     @type array<\Etcd\RequestUnion>|\Google\Protobuf\Internal\RepeatedField $success
     *     @type array<\Etcd\RequestUnion>|\Google\Protobuf\Internal\RepeatedField $failure
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Rpc::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.Compare compare = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCompare()
    {
        return $this->compare;
    }

    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.Compare compare = 1;</code>
     * @param array<\Etcd\Compare>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCompare($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Etcd\Compare::class);
        $this->compare = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.RequestUnion success = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.RequestUnion success = 2;</code>
     * @param array<\Etcd\RequestUnion>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSuccess($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Etcd\RequestUnion::class);
        $this->success = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.RequestUnion failure = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFailure()
    {
        return $this->failure;
    }

    /**
     * Generated from protobuf field <code>repeated .etcdserverpb.RequestUnion failure = 3;</code>
     * @param array<\Etcd\RequestUnion>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFailure($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Etcd\RequestUnion::class);
        $this->failure = $arr;

        return $this;
    }

}

