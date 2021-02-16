<?php


namespace Tests\Unit;

use App\Services\RabbitMQServices\Consumer;
use App\Services\RabbitMQServices\HandleConnection;
use App\Services\RabbitMQServices\Producer;
use Mockery;
use Tests\TestCase;

class RabbitmqConnectionTest extends TestCase
{

    public function tearDown() : void
    {
        Mockery::close();
    }

    public function testConnection()
    {
        $connection = new HandleConnection();

        $this->assertEquals(60,  $connection::connect()->getHeartbeat());
        $this->assertEquals(60, $connection::connect()->getInsist());
        $this->assertEquals(60, $connection->connect()->getLoginMethod());
        $this->assertEquals('/', $connection->connect()->getVhost());
    }

    public function testProducer()
    {
        $message = json_encode(['test' => 'message']);
        $producer = new Producer(new HandleConnection());
        $consumer = new Consumer(new HandleConnection());

        $producer->produce($message);
        $consumer->consume();
    }
}
