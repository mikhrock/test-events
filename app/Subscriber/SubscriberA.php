<?php

namespace App\Subscriber;

class SubscriberA implements SubscriberInterface
{
    public function update(string $event, array $callStack): array
    {
        switch ($event) {
            case "Event":
                $this->methodA();
                $callStack[__CLASS__] = 'methodA';
                break;
        }

        return $callStack;
    }

    public function methodA(): void
    {
        $subscriberB = new SubscriberB();
        $subscriberB->methodB();
    }
}