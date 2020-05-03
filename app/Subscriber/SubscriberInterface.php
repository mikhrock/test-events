<?php

namespace App\Subscriber;

interface SubscriberInterface
{
    public function update(string $event, array $callStack): array;
}