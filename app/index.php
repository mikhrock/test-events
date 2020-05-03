<?php

require_once 'EventDispatcher/EventDispatcherInterface.php';
require_once 'EventDispatcher/EventDispatcher.php';
require_once 'Subscriber/SubscriberInterface.php';
require_once 'Subscriber/SubscriberA.php';
require_once 'Subscriber/SubscriberB.php';
require_once 'Subscriber/SubscriberC.php';
require_once 'Subscriber/SubscriberD.php';

use App\EventDispatcher\EventDispatcher;
use App\Subscriber\SubscriberA;
use App\Subscriber\SubscriberB;
use App\Subscriber\SubscriberC;
use App\Subscriber\SubscriberD;

$eventDispatcher = new EventDispatcher();

$subscribers = [
    new SubscriberA(),
    new SubscriberC(),
    new SubscriberD(),
];

foreach ($subscribers as $subscriber) {
    $eventDispatcher->subscribe("Event", $subscriber);
}

$eventDispatcher->dispatch("Event");