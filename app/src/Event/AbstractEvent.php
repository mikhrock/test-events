<?php

namespace App\Event;


abstract class AbstractEvent implements EventInterface
{
    abstract public function getName(): string;
}