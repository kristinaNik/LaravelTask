<?php


namespace App\Services\RabbitMQServices;


abstract class AbstractHandler
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var RabbitmqDTO
     */
    protected $dto;

    /**
     * Producer constructor.
     * @param HandleConnection $connection
     */
    public function __construct(HandleConnection $connection)
    {
        $this->connection = $connection::connect();
        $this->dto = $connection::setDTO();
    }

    /**
     * @throws \Exception
     */
    public function setQueueConfiguration(): void
    {
        $this->connection->getChannel()->queue_declare($this->dto->getQueueName(), false, true, false, false);
        try {
            $this->connection->getChannel()->exchange_declare($this->connection, $this->dto->getExchange(), $this->dto->isPassive(), $this->dto->isDurable(), $this->dto->isAutoDelete());
        } catch (\Exception $e) {
            throw new \Exception("exchange failure");
        }

        $this->connection->getChannel()->queue_bind($this->dto->getQueueName(), $this->dto->getExchange());
    }


}
