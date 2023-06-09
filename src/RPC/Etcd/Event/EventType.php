<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Proto/kv.proto

namespace Etcd\Event;

use UnexpectedValueException;

/**
 * Protobuf type <code>storagepb.Event.EventType</code>
 */
class EventType
{
    /**
     * Generated from protobuf enum <code>PUT = 0;</code>
     */
    const PUT = 0;
    /**
     * Generated from protobuf enum <code>DELETE = 1;</code>
     */
    const DELETE = 1;
    /**
     * Generated from protobuf enum <code>EXPIRE = 2;</code>
     */
    const EXPIRE = 2;

    private static $valueToName = [
        self::PUT => 'PUT',
        self::DELETE => 'DELETE',
        self::EXPIRE => 'EXPIRE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventType::class, \Etcd\Event_EventType::class);

