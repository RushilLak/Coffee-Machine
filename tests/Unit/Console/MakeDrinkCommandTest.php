<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console;

class MakeDrinkCommandTest extends TestAbstractController
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testChocolate(): void
    {
        $message = $this->orderDrinkService->execute('chocolate', '0.7', 1, '');
        $this->assertEquals('You have ordered a chocolate with 1 sugars (stick included)', $message);
    }

    public function testTea(): void
    {
        $message = $this->orderDrinkService->execute('tea', '0.4', 0, '1');
        $this->assertEquals('You have ordered a tea extra hot', $message);
    }

    public function testCoffee(): void
    {
        $message = $this->orderDrinkService->execute('coffee', '2', 2, '1');
        $this->assertEquals('You have ordered a coffee extra hot with 2 sugars (stick included)', $message);
    }

    public function testSugarsException(): void
    {
        $this->expectExceptionMessage('The number of sugars should be between 0 and 2.');
        $this->orderDrinkService->execute('tea', '0.5', -1, '1');
    }

    public function testPriceException(): void
    {
        $this->expectExceptionMessage('The coffee costs 0.5.');
        $this->orderDrinkService->execute('coffee', '0.2', 2, '1');
    }

    public function testDrinkTypeException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->orderDrinkService->execute('drink', '0.2', 2);
    }
}
