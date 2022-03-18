<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Application;

use GetWith\CoffeeMachine\Domain\Drink;
use GetWith\CoffeeMachine\Domain\Repository\CoffeeOrderRepository;

final class OrderDrinkService
{
    private CoffeeOrderRepository $coffeeOrderRepository;

    public function __construct(CoffeeOrderRepository $coffeeOrderRepository)
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
