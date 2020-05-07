<?php

namespace App\Event;

class BalanceUpdatedEvent  extends AbstractEvent
{
    public function getName(): string
    {
        return "BalanceUpdatedEvent";
    }
}