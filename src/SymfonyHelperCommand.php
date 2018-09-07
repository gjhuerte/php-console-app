<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SymfonyHelperCommand extends Command
{

    private static $source = "src/DefaultCommand.php";

    public function configure()
    {
        $this->setName('make:command')
            ->setDescription('Create a command file with default values already set')
            ->addArgument('path', InputArgument::REQUIRED, 'Source folder location');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Preparing the file...</info>');
        $output->writeln('<info>Creating new file...</info>');
        $destination = sprintf("%s.php", $input->getArgument('path'));
        @copy(self::$source, $destination);
        $output->writeln('<info>Finished! Enjoy</info>');
    }
}