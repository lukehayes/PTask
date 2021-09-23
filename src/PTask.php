<?php
namespace PTask;

use PTask\TaskManager;
use PTask\Formatter;

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
            $this->runTask( [$argv[1]] );
            return;
        } else
        {
            // Run as normal - "flag - argument".
            $flags = $this->parseArguments($argv);
            $this->runTask($flags);
        }
    }

    /**
     * Parse the arguments from the command line.
     *
     * @return array
     */
    function parseArguments($args) : array
    {
        $flags = [];
        array_push($flags, $args[1]);

        if(array_key_exists(2, $args))
        {
            array_push($flags, $args[2]);
        }

        return $flags;
    }

    /**
     * Run the appropiate task based on flag input.
     */
    public function runTask($task)
    {
        $formatter = new Formatter();

        switch ($task[0]) {
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
