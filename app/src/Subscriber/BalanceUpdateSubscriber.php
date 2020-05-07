<?php

namespace App\Subscriber;

use App\Event\EventInterface;

class BalanceUpdateSubscriber extends AbstractSubscriber
{
    public function notifyUser(EventInterface $event): void
    {

    }
}