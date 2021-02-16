<?php


namespace App\Services;


class RabbitmqDTO
{


    /**
     * @var string
     */
    protected $exchange;


    /**
     * @var string
     */
    protected $exchangeType;


    /**
     * @var bool
     */
    protected $passive;


    /**
     * @var bool
     */
    protected $durable;


    /**
     * @var bool
     */
    protected $autoDelete;

    /**
     * @var int
     */
    protected $deliveryMode;


    /**
     * Setup Producer.
     *
     * @param string $exchange
     * @param string $exchangeType
     * @param bool   $passive
     * @param bool   $durable
     * @param bool   $autoDelete
     * @param int    $deliveryMode
     */
    public function __construct($exchange, $exchangeType = 'fanout', $passive = false, $durable = true, $autoDelete = false, $deliveryMode = 2)
    {
        $this->exchange = $exchange;
        $this->exchangeType = $exchangeType;
        $this->passive = $passive;
        $this->durable = $durable;
        $this->autoDelete = $autoDelete;
        $this->deliveryMode = $deliveryMode;
    }

    /**
     * @return string
     */
    public function getExchange(): string
    {
        return $this->exchange;
    }

    /**
     * @return string
     */
    public function getExchangeType(): string
    {
        return $this->exchangeType;
    }

    /**
     * @return bool
     */
    public function isPassive(): bool
    {
        return $this->passive;
    }

    /**
     * @return bool
     */
    public function isDurable(): bool
    {
        return $this->durable;
    }

    /**
     * @return bool
     */
    public function isAutoDelete(): bool
    {
        return $this->autoDelete;
    }

    /**
     * @return int
     */
    public function getDeliveryMode(): int
    {
        return $this->deliveryMode;
    }


}
