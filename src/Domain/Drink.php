<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\Domain;

use Exception;
use GetWith\CoffeeMachine\Domain\Entity\Drink\Chocolate;
use GetWith\CoffeeMachine\Domain\Entity\Drink\Coffee;
use GetWith\CoffeeMachine\Domain\Entity\Drink\Tea;

abstract class Drink
{
    protected string $name;
    protected float $money;

    private const ITEMS = [
        'tea' => 'tea',
        'chocolate' => 'chocolate',
        'coffee' => 'coffee'
    ];

    public static function fromData(string $type): self|Exception
    {
        self::check($type);

        return match ($type) {
            'tea' => Drink::createTea(),
            'coffee' => Drink::createCoffee(),
            'chocolate' => Drink::createChocolate()
        };
    }

    private static function createTea(): self
    {
        return new Tea();
    }

    private static function createChocolate(): self
    {
        return new Chocolate();
    }

    private static function createCoffee(): self
    {
        return new Coffee();
    }

    public function name(): string
    {
        return $this->name;
    }

    public function money(): float
    {
        return $this->money;
    }

    private static function check(string $type): bool|Exception
    {
        if (in_array($type, self::ITEMS)) {
            return true;
        }

        throw new \InvalidArgumentException('The drink type should be tea, coffee or chocolate.');
    }
}
