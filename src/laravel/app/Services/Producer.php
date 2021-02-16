<?php


namespace App\Services;


class Producer
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var RabbitmqDTO
     */
    private $dto;

    /**
     * Producer constructor.
     * @param HandleConnection $connection
     */
    public function __construct(HandleConnection $connection)
    {
        $this->connection = $connection::connect();
        $this->dto = $connection::setDTO();
    }

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
