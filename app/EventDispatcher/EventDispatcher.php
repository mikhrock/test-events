<?php

namespace App\EventDispatcher;

class EventDispatcher implements EventDispatcherInterface
{
    private $subscribers;

    private $callStack;

    private $callStackItem;

    public function __construct()
    {
        $this->callStack = [];
        $this->callStackItem = [];
    }

    private function initEventGroup(string $event): void
    {
        if (!isset($this->subscribers[$event])) {
            $this->subscribers[$event] = [];
        }
    }

    private function getEventSubscribers(string $event): array
    {
        $this->initEventGroup($event);

        return $this->subscribers[$event];
    }

    public function subscribe(string $event, object $subscriber): void
    {
        $this->initEventGroup($event);

        $this->subscribers[$event][] = $subscriber;
    }

    public function dispatch(string $event): void
    {
        echo "'$event':<br/>";
        foreach ($this->getEventSubscribers($event) as $subscriber) {
            $this->callStack = $subscriber->update($event, $this->callStack);
        }

        foreach ($this->callStack as $class => $method)
        {
            echo "-> $class::$method<br/>";
        }
    }
}