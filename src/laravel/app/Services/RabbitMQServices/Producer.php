<?php


namespace App\Services\RabbitMQServices;


class Producer extends AbstractHandler
{
    /**
     * @param $message
     * @throws \Exception
     */
    public function produce($message)
    {
        $channel =  $this->connection->getChannel();

        $this->setQueueConfiguration();

        $channel->basic_publish($message, $this->dto->getExchange());
        echo ' [x] Data Sent to ', $this->dto->getExchange(), ' Exchange!', "\n";

        $channel->close();
        $this->connection->getConnection()->close();
    }

}
