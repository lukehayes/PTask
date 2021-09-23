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
     */
    public function line($length = 50, $char ="-")
    {
        for ($i = 0; $i <= $length; $i++)
        {
            echo $char;
        }

        $this->newline();
    }

    /**
     * Output a title bar (two lines) with some content.
     *
     * @param string $contents    The text to output.
     * @param int $size           The size of the lines.
     */
    public function titleBar($contents, $size = 50)
    {
        $this->line($size);
        echo $contents;
        $this->newline();
        $this->line($size);
    }

    /**
     * Wrapper function for the new line character.
     */
    public function newline()
    {
        echo "\n";
    }
}
