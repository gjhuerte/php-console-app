<?php

namespace Acme\Modules;

class File implements FileInterface
{

    /**
     * read file and returns it
     * 
     * @param  String $filename location where the file will be read
     * @param  OutputInterface $output   writing in the console
     * @param  String $mode
     * @return file pointer resources           
     */
    public static function read($filename, $output, $mode = "r", $errorMessage = '<error>Unable to read file</error>')
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
    public function write($filename, $output, $message = '<comment>File created successfully</comment>')
    {
        file_put_contents($file, $this->contents);
        $output->writeln($message);
    }
}