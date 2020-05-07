<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Event\BalanceUpdatedEvent;
use App\Event\BonusTransactionCompletedEvent;
use App\Event\TransactionCompletedEvent;
use App\EventDispatcher\EventDispatcher;
use App\Subscriber\TransactionSubscriber;
use App\Subscriber\BalanceUpdateSubscriber;

$eventDispatcher = new EventDispatcher();

$eventDispatcher->subscribe(TransactionCompletedEvent::class, [TransactionSubscriber::class, 'creditBalance']);
$eventDispatcher->subscribe(TransactionCompletedEvent::class, [TransactionSubscriber::class, 'calculateBonuses']);
$eventDispatcher->subscribe(TransactionCompletedEvent::class, [TransactionSubscriber::class, 'sendEmail']);

$eventDispatcher->subscribe(BalanceUpdatedEvent::class, [BalanceUpdateSubscriber::class, 'notifyUser']);

$eventDispatcher->subscribe(BonusTransactionCompletedEvent::class, [TransactionSubscriber::class, 'creditBalance']);

$event = new TransactionCompletedEvent();

$eventDispatcher->dispatch($event);