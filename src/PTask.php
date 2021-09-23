<?php
namespace PTask;

use PTask\TaskManager;

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
            echo "No additonal arguments are present.\n"; 
            return;
        } else
        {
            $flags = $this->parseArguments($argv);
            $this->runTask($flags);;
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
        array_push($flags, $args[2]);
        return $flags;
    }

    /**
     * Run the appropiate task based on flag input.
     */
    public function runTask($task)
    {
        switch ($task[0]) {
            case "-ls":
                echo "Listing All Tasks...\n";
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
