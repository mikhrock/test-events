<?php

namespace App\EventDispatcher;

interface EventDispatcherInterface
{
    public function subscribe(string $event, object $subscriber): void;

    public function dispatch(string $event): void;
}