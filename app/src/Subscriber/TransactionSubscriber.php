<?php

namespace App\Subscriber;

use App\Event\BalanceUpdatedEvent;
use App\Event\BonusTransactionCompletedEvent;
use App\Event\EventInterface;

class TransactionSubscriber extends AbstractSubscriber
{
    public function creditBalance(EventInterface $event): void
    {
        $this->eventDispatcher->dispatch(
            new BalanceUpdatedEvent()
        );
    }

    public function calculateBonuses(EventInterface $event): void
    {
        $this->eventDispatcher->dispatch(
            new BonusTransactionCompletedEvent()
        );
    }

    public function sendEmail(EventInterface $event): void
    {

    }
}