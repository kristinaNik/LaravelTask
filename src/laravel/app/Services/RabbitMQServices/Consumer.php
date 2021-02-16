<?php


namespace App\Services\RabbitMQServices;


class Consumer extends AbstractHandler
{
    public function consume()
    {
        $channel =  $this->connection->getChannel();


        $channel->basic_qos(null, 1, null);
        $channel->basic_consume($this->dto->getQueueName(), '', false, false, false, false,  'process_message');


        echo ' [*] Listening to Queue: ', $this->dto->getQueueName(), ' To exit press CTRL+C', "\n";

        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }

}
