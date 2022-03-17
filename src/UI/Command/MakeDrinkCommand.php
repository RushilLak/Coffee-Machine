<?php

declare(strict_types=1);

namespace GetWith\CoffeeMachine\UI\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use GetWith\CoffeeMachine\Application\OrderDrinkService;

final class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';

    private OrderDrinkService $orderDrinkService;

    public function __construct(OrderDrinkService $orderDrinkService)
    {
        parent::__construct(MakeDrinkCommand::$defaultName);
        $this->orderDrinkService = $orderDrinkService;
    }


    protected function configure(): void
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'extr',
            InputOption::VALUE_NONE,
            $description = 'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $drinkType = strtolower($input->getArgument('drink-type'));
        $money = (float) $input->getArgument('money');
        $sugars = (int) $input->getArgument('sugars');
        $extraHot = $input->getOption('extra-hot');

        try {
            $message = $this->orderDrinkService->execute($drinkType, $money, $sugars, $extraHot);
            $output->writeln($message);
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }

        return Command::SUCCESS;
    }
}
