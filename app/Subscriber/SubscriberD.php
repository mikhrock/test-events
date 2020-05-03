<?php

namespace App\Subscriber;

class SubscriberD implements SubscriberInterface
{
    public function update(string $event, array $callStack): array
    {
        switch ($event) {
            case "Event":
                $this->methodD();
                $callStack[__CLASS__] = 'methodD';
                break;
        }

        return $callStack;
    }

    public function methodD()
    {

    }
}