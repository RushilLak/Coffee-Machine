<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Entity\Drink;

use GetWith\CoffeeMachine\Domain\Drink;

final class Coffee extends Drink
{
    public function __construct()
    {
        $this->name = 'coffee';
        $this->money = 0.5;
    }
}
