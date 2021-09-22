<?php
namespace PTask;

/**
 * Class for formatting the command line output.
 */
class Formatter
{
    /**
     * Print a line to the command line.
     *
     * @param int    $length    The number of characters. Default: 50.
     * @param string $char      The characters to print.  Default: "-".
    public function line($length = 50, $char ="-")
    {
        for ($i = 0; $i <= $length; $i++)
        {
            echo $char;
        }

        echo "\n";
    }
}
