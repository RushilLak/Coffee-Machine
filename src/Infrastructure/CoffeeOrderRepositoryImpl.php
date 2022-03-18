<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Infrastructure;

use GetWith\CoffeeMachine\Domain\Drink;
use GetWith\CoffeeMachine\Domain\Repository\CoffeeOrderRepository;

class CoffeeOrderRepositoryImpl implements CoffeeOrderRepository
{
    public function order(Drink $drink, float $money, int $sugars = 0, mixed $extraHot = null): string
    {
        if ($money < $drink->money()) {
            throw new \Exception('The ' . $drink->name() . ' costs ' . $drink->money() . '.');
        }

        if ($sugars >= 0 && $sugars <= 2) {
            $message = 'You have ordered a ' . $drink->name();
            if ($extraHot) {
                $message .= ' extra hot';
            }
            if ($sugars > 0) {
                $message .= ' with ' . $sugars . ' sugars (stick included)';
            }

            return $message;
        }

        throw new \Exception('The number of sugars should be between 0 and 2.');
    }
}