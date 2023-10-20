<?php

namespace App;

use PHP_Parallel_Lint\PhpConsoleColor;

class Application
{
    public function run()
    {

        $consoleColor = new PhpConsoleColor\ConsoleColor();

        echo "\n";
        echo $consoleColor->apply(['bold', 'red'], "test\n");
        echo "test2";


    }
}