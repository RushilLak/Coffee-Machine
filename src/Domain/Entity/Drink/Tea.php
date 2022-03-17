<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Entity\Drink;

use GetWith\CoffeeMachine\Domain\Drink;

final class Tea extends Drink
{
    public function __construct()
    {
        $this->name = 'tea';
        $this->money = 0.4;
    }
}
