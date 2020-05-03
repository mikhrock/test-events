<?php

namespace App\Subscriber;

class SubscriberB implements SubscriberInterface
{
    public function update(string $event, array $callStack): array
    {
        switch ($event) {
            case "Event":
                $this->methodB();
                break;
        }

        return $callStack;
    }

    public function methodB()
    {

    }
}