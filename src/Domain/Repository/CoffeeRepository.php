<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain\Repository;

use GetWith\CoffeeMachine\Domain\Drink;

interface CoffeeRepository
{
    public function order(Drink $drink, float $money, int $sugars = 0, mixed $extraHot = null): string;
}
