<?php

namespace App\Event;

class TransactionCompletedEvent extends AbstractEvent
{
    public function getName(): string
    {
        return "TransactionCompletedEvent";
    }
}