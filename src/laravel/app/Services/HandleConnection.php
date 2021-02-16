<?php


namespace App\Services;


class HandleConnection
{

    /**
     * @return Connection
     */
    public static function connect(): Connection
    {
        return new Connection(
            getenv('RABBITMQ_HOST'),
            getenv('RABBITMQ_PORT'),
            getenv('RABBITMQ_DEFAULT_USER'),
            getenv('RABBITMQ_DEFAULT_PASS'),
            30,
            30,
            15,
            getenv('RABBITMQ_VHOST'));
    }

    /**
     * @return RabbitmqDTO
     */
    public static function setDTO(): RabbitmqDTO
    {
        return new RabbitmqDTO('laravel-exchange');
    }
}
