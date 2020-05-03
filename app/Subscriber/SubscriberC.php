<?php

namespace App\Subscriber;

class SubscriberC implements SubscriberInterface
{
    public function update(string $event, array $callStack): array
    {
        switch ($event) {
            case "Event":
                $this->methodC();
                $callStack[__CLASS__] = 'methodC';
                break;
        }

        return $callStack;
    }

    public function methodC(): void
    {
        $subscriberA = new SubscriberA();
        $subscriberA->methodA();
    }
}