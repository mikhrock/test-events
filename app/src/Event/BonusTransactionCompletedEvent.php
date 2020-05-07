<?php

namespace App\Event;

class BonusTransactionCompletedEvent  extends AbstractEvent
{
    public function getName(): string
    {
        return "BonusTransactionCompletedEvent";
    }
}