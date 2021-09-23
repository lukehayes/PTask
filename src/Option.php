<?php
namespace PTask;

/**
 * Class represents an option sent in from the command line.
 * Example -a "Some task".
 *
*/
class Option
{
    public function __construct(
        public $flag, 
        public $argument = "")
    {}
}

