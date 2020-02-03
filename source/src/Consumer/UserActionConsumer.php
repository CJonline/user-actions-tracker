<?php

namespace App\Consumer;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Service\SlowStorage\StorageInterface;

class UserActionConsumer implements ConsumerInterface
{
    /**
     * @var StorageInterface
     */
    private $slowStorage;

    /**
     * @var string
     */
    private $storagePath;

    public function __construct(StorageInterface $slowStorage, string $storagePath)
    {
        $this->slowStorage = $slowStorage;
        $this->storagePath = $storagePath;
    }

    /**
     * @param AMQPMessage $msg The message
     *
     * @return mixed false to reject and requeue, any other value to acknowledge
     */
    public function execute(AMQPMessage $msg)
    {
        if ($this->slowStorage->exists($this->storagePath)) {
            $this->slowStorage->load($this->storagePath);
        }
    }
}