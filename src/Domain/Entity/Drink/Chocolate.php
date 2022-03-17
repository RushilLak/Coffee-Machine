<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Entity\Drink;

use GetWith\CoffeeMachine\Domain\Drink;

final class Chocolate extends Drink
{
    public function __construct()
    {
        $this->name = 'chocolate';
        $this->money = 0.6;
    }
}
