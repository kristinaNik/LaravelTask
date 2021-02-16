<?php


namespace App\Services;


use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class Connection
{

    /**
     * $connection var.
     *
     * @var AMQPStreamConnection
     */
    private $connection;

    /**
     * $channel var.
     *
     * @var AMQPChannel
     */
    private $channel;

    private $host;

    private $port;

    private $user;

    private $password;

    private $insist;

    private $loginMethod;

    private $heartbeat;

    private $vhost;

    /**
     * Connection constructor.
     *
     * @param $host
     * @param $port
     * @param $user
     * @param $password
     * @param $insist
     * @param $loginMethod
     * @param $heartbeat
     * @param $vhost
     */
    public function __construct($host, $port, $user, $password,$insist, $loginMethod, $heartbeat, $vhost)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $user;
        $this->password = $password;
        $this->connectionTimeout = $insist;
        $this->readWriteTimeout = $loginMethod;
        $this->heartbeat = $heartbeat;
        $this->vhost = $vhost;

        $this->initConnection($host, $port, $user, $password, $insist, $loginMethod, $heartbeat, $vhost);
    }

    protected function initConnection($host, $port, $user, $password,$insist, $loginMethod, $heartbeat, $vhost)
    {
        $this->connection = new AMQPStreamConnection($host, $port, $user, $password, $insist,$loginMethod,$heartbeat,$vhost);
        $this->channel =  $this->connection->channel();
    }


    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return AMQPChannel
     */
    public function getChannel(): AMQPChannel
    {
        return $this->channel;
    }


    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getInsist()
    {
        return $this->insist;
    }

    /**
     * @return mixed
     */
    public function getLoginMethod()
    {
        return $this->loginMethod;
    }

    /**
     * @return mixed
     */
    public function getHeartbeat()
    {
        return $this->heartbeat;
    }

    /**
     * @return mixed
     */
    public function getVhost()
    {
        return $this->vhost;
    }


}
