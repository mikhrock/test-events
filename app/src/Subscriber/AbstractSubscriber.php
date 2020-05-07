<?php

namespace App\Subscriber;

use App\EventDispatcher\EventDispatcher;

abstract class AbstractSubscriber
{
    protected EventDispatcher $eventDispatcher;

    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
}