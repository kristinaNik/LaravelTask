<?php


namespace Tests\Unit;


use App\Services\Connection;
use App\Services\HandleConnection;
use App\Services\Producer;
use Illuminate\Broadcasting\Channel;
use Mockery;
use PhpAmqpLib\Connection\AMQPStreamConnection;
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

        $this->assertEquals(30,  $connection::connect()->getHeartbeat());
        $this->assertEquals(60, $connection::connect()->getInsist());
        $this->assertEquals(60, $connection->connect()->getLoginMethod());
        $this->assertEquals('/', $connection->connect()->getVhost());

    }

    public function testProducer()
    {
        $message = json_encode(['test' => 'message']);
        $producer = new Producer(new HandleConnection());

        $producer->produce($message);

    }
}
