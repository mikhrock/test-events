<?php

namespace App\EventDispatcher;

use App\Event\EventInterface;

class EventDispatcher implements EventDispatcherInterface
{
    private array $subscribers = [];

    private function getEventSubscribers(EventInterface $event): array
    {
        return $this->subscribers[get_class($event)];
    }

    public function subscribe(string $event, array $subscriberInfo): void
    {
        $this->subscribers[$event][] = $subscriberInfo;
    }

    public function dispatch(EventInterface $event): void
    {
        $eventName = $event->getName();

        echo "'$eventName':<br/>";

        foreach ($this->getEventSubscribers($event) as $subscriber) {
            $subscriberObject = new $subscriber[0]($this);

            echo "->" . get_class($subscriberObject) . "::" . $subscriber[1] . "<br/> ";

            $subscriberObject->{$subscriber[1]}($event);
        }
    }
}