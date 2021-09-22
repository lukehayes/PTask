<?php
namespace PTask;

/**
 * Manages reading, writing and updating of tasks.
 */
class TaskManager
{
    /**
     * Read the entire contents of a file
     *
     * @param string $file    The file to be read.
     * @return string         The files contents.
     */
    public function read($file) : string
    {
        return file_get_contents($file);
    }
}

