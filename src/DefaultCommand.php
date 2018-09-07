<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DefaultCommand extends Command
{
    public function configure()
    {
        $this->setName('hello')
            ->setDescription('Additional default commands in using symfony console')
            ->addArgument('name', InputArgument::REQUIRED, 'Enter your name')
            ->addOption('greeting', null, InputOption::VALUE_OPTIONAL, 'Override default greeting message', 'Hello');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $message = sprintf('%s %s', $input->getOption('greeting'), $input->getArgument('name'));
        $output->writeln('<info></info>' . $message . '</info>');
    }
}