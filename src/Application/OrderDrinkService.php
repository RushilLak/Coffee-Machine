<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Application;

use GetWith\CoffeeMachine\Domain\Drink;
use GetWith\CoffeeMachine\Domain\Repository\CoffeeRepository;

final class OrderDrinkService
{
    private CoffeeRepository $coffeeOrderRepository;

    public function __construct(CoffeeRepository $coffeeOrderRepository)
    {
        $this->coffeeOrderRepository = $coffeeOrderRepository;
    }

    public function execute(string $type, float $money, int $sugars, mixed $extraHot = null): string
    {
        /** @var Drink $drink */
        $drink = Drink::fromData($type);
        return $this->coffeeOrderRepository->order($drink, $money, $sugars, $extraHot);
    }
}
