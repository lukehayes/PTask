<?php
namespace PTask;

/**
 * Manages reading, writing and updating of tasks.
 */
class TaskManager
{
    /**
     * @var string $todolist */
    private $todolist = NULL;

    public function __construct($file)
    {
        $this->todolist = $file;
    }

    /**
     * Set the todolist file that is read and written to etc.
     *
     * @return void
     */
    public function setTodoList($file) : void
    {
        $this->todolist = $file;
    }

    /**
     * Read the entire contents of a file
     *
     * @return void         The files contents.
     */
    public function read() : void
    {
        echo file_get_contents($this->todolist);
    }

    /**
     * Write a new task to the todolist.
     *
     * @param string $text    The text to write.
     *
     * @return void         
     */
    public function write(string $text) : void
    {
        $text = $text . "\n";
        file_put_contents($this->todolist, $text, FILE_APPEND);
    }

    /**
     * Get the entire contents of a file.
     *
     * @return string         The files contents.
     */
    public function getTodolist() : string
    {
        return file_get_contents($this->todolist);
    }
}

