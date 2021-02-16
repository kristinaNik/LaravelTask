<?php


namespace App\Services\RabbitMQServices;


class Producer extends AbstractHandler
{
    public function produce($message)
    {
        $channel =  $this->connection->getChannel();

        try {
            $channel->exchange_declare($this->connection, $this->dto->getExchange(), $this->dto->isPassive(), $this->dto->isDurable(), $this->dto->isAutoDelete());
        } catch (\Exception $e) {
            throw new \Exception("exchange failure");
        }

        $channel->basic_publish($message);

        echo ' [x] Data Sent to ', $this->dto->getExchange(), ' Exchange!', "\n";

        $channel->close();
        $this->connection->getConnection()->close();
    }

}
