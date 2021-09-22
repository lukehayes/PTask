#!/usr/bin/php
<?php
require "vendor/autoload.php";

use PTask\Formatter;

$formatter = new Formatter();
$file = "todo.txt";

function parseArguments($args)
{
    global $argc;
    $flags = [];

    if ($argc <= 2) {
        echo "No additonal arguments are present.\n"; 
        return;
    }

    array_push($flags, $args[1]);
    array_push($flags, $args[2]);
    
    return $flags;
}

$flags = parseArguments($argv);

switch ($flags[0]) {
    case "-ls":
        echo "Listing All Tasks...\n";
        break;
    case "-a":
        echo "Adding Tasks.\n";
        break;
    case "-d":
        echo "Marking Task As Done.\n";
        break;
    case "-clear":
        $formatter->line();
        echo "CLEARING ALL TASKS.\n";
        $formatter->line();
        break;
    
    default:
        echo "Nothing To Be Done.\n";
        break;
}

