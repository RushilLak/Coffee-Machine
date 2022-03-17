<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Application;

use GetWith\CoffeeMachine\Domain\Drink;

final class OrderDrinkService
{
    public function execute(string $type, float $money, int $sugars, mixed $extraHot = null): string
    {
        /** @var Drink $drink */
        $drink = Drink::fromData($type);

        return $drink->order($money, $sugars, $extraHot);
    }
}
