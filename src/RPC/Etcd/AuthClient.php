<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Etcd;

/**
 */
class AuthClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * AuthEnable enables authentication.
     * @param \Etcd\AuthEnableRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AuthEnable(\Etcd\AuthEnableRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/AuthEnable',
        $argument,
        ['\Etcd\AuthEnableResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * AuthDisable disables authentication.
     * @param \Etcd\AuthDisableRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AuthDisable(\Etcd\AuthDisableRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/AuthDisable',
        $argument,
        ['\Etcd\AuthDisableResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Authenticate processes authenticate request.
     * @param \Etcd\AuthenticateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Authenticate(\Etcd\AuthenticateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/Authenticate',
        $argument,
        ['\Etcd\AuthenticateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * UserAdd adds a new user.
     * @param \Etcd\UserAddRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UserAdd(\Etcd\UserAddRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserAdd',
        $argument,
        ['\Etcd\UserAddResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * UserGet gets a detailed information of a user or lists entire users.
     * @param \Etcd\UserGetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UserGet(\Etcd\UserGetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserGet',
        $argument,
        ['\Etcd\UserGetResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * UserDelete deletes a specified user.
     * @param \Etcd\UserDeleteRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UserDelete(\Etcd\UserDeleteRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserDelete',
        $argument,
        ['\Etcd\UserDeleteResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * UserChangePassword changes password of a specified user.
     * @param \Etcd\UserChangePasswordRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UserChangePassword(\Etcd\UserChangePasswordRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserChangePassword',
        $argument,
        ['\Etcd\UserChangePasswordResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * UserGrant grants a role to a specified user.
     * @param \Etcd\UserGrantRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UserGrant(\Etcd\UserGrantRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserGrant',
        $argument,
        ['\Etcd\UserGrantResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * UserRevoke revokes a role of specified user.
     * @param \Etcd\UserRevokeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UserRevoke(\Etcd\UserRevokeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserRevoke',
        $argument,
        ['\Etcd\UserRevokeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RoleAdd adds a new role.
     * @param \Etcd\RoleAddRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RoleAdd(\Etcd\RoleAddRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleAdd',
        $argument,
        ['\Etcd\RoleAddResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RoleGet gets a detailed information of a role or lists entire roles.
     * @param \Etcd\RoleGetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RoleGet(\Etcd\RoleGetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleGet',
        $argument,
        ['\Etcd\RoleGetResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RoleDelete deletes a specified role.
     * @param \Etcd\RoleDeleteRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RoleDelete(\Etcd\RoleDeleteRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleDelete',
        $argument,
        ['\Etcd\RoleDeleteResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RoleGrant grants a permission of a specified key or range to a specified role.
     * @param \Etcd\RoleGrantRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RoleGrant(\Etcd\RoleGrantRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleGrant',
        $argument,
        ['\Etcd\RoleGrantResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RoleRevoke revokes a key or range permission of a specified role.
     * @param \Etcd\RoleRevokeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RoleRevoke(\Etcd\RoleRevokeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleRevoke',
        $argument,
        ['\Etcd\RoleRevokeResponse', 'decode'],
        $metadata, $options);
    }

}
