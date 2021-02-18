<?php


namespace Tests\Unit;

use App\Services\RabbitMQServices\Consumer;
use App\Services\RabbitMQServices\HandleConnection;
use App\Services\RabbitMQServices\Producer;
use Tests\TestCase;

class RabbitmqConnectionTest extends TestCase
{

    public function testConnection()
    {
        $connection = new HandleConnection();

        $this->assertEquals(30,  $connection::connect()->getHeartbeat());
        $this->assertEquals(30, $connection::connect()->getInsist());
        $this->assertEquals(15, $connection->connect()->getLoginMethod());
        $this->assertEquals('/', $connection->connect()->getVhost());
    }

    public function testMessage()
    {
        $message = json_encode(['message' => 'hi']);
        $connection = new HandleConnection();

        $producer = new Producer($connection);
        $consumer = new Consumer($connection);
        $producer->produce($message);
        $consumer->consume();
    }
}
