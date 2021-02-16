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

}
