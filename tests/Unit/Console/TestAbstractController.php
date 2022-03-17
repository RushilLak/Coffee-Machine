<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console;

use GetWith\CoffeeMachine\Application\OrderDrinkService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class TestAbstractController extends WebTestCase
{
    protected OrderDrinkService $orderDrinkService;

    public function setUp(): void
    {
        $this->orderDrinkService = new OrderDrinkService();
    }
}
