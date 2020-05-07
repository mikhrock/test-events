<?php

namespace App\EventDispatcher;

use App\Event\EventInterface;

interface EventDispatcherInterface
{
    public function subscribe(string $event, array $subscriber): void;

    public function dispatch(EventInterface $event): void;
}