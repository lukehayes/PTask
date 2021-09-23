<?php
namespace PTask;

use PTask\TaskManager;
use PTask\Formatter;
use PTask\Option;

/**
 * Main entry point for this application.
 */
class PTask
{
    private $taskManager = NULL;

    public function __construct()
    {
        $this->taskManager = new TaskManager("todo.txt");
    }

    /**
     * Start the application.
     */
    public function run($argc, $argv)
    {
        if ($argc <= 2) {
            // Run for a command without an argument list "-ls".
            $this->runTask( new Option($argv[1]) );
            return;
        } else
        {
            // Run as normal - "flag - argument".
            $option = $this->parseArguments($argv);
            $this->runTask($option);
        }
    }

    /**
     * Parse the arguments from the command line.
     *
     * @return array
     */
    function parseArguments($args) : Option
    {
        $option = new Option($args[1]);

        if(array_key_exists(2, $args))
        {
            $option->argument = $args[2];
        }

        return $option;
    }

    /**
     * Run the appropiate task based on flag input.
     */
    public function runTask($option)
    {
        $formatter = new Formatter();

        switch ($option->flag) {
            case "-ls":
                $formatter->titleBar("All Tasks");
                $this->taskManager->read();
                break;
            case "-a":
                echo "Adding Tasks.\n";
                break;
            case "-d":
                echo "Marking Task As Done.\n";
                break;
            case "-clear":
                echo "CLEARING ALL TASKS.\n";
                break;
            
            default:
                echo "Nothing To Be Done.\n";
                break;
        }
    }
}
