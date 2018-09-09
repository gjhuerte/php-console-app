<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Acme\Modules\File;

class SymfonyHelperCommand extends Command
{

    private static $source = "src/DefaultCommand.php";
    private $file;
    private $contents = [];

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

    /**
     * read file and returns it
     * 
     * @param  String $filename location where the file will be read
     * @param  OutputInterface $output   writing in the console
     * @param  String $mode
     * @return file pointer resources           
     */
    public function readFromFile($filename, $output, $mode = "r", $errorMessage = '<error>Unable to read file</error>')
    {
        $file = fopen($filename, "r") or $output->writeln($errorMessage);
        $output->writeln('<comment>Started processing the file...</comment>');

        return $file;
    }

    /**
     * Loops through each record in file and assigns to contents
     * 
     * @param  pointer $file 
     * @return void
     */
    public function loop($file)
    {
        while(!feof($file)) {
            $this->contents = fgets($file) . PHP_EOL;
        }

        fclose();
    }

    /**
     * Write the contents to a file
     * 
     * @param  String $filename source file
     * @param  String $message  message to write
     * @return void
     */
    public function writeToFile($filename, $output, $message = '<comment>File created successfully</comment>')
    {
        file_put_contents($file, $this->contents);
        $output->writeln($message);
    }
}