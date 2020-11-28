<?php

namespace app\core;

/**
 * Class Request
 *
 * @author Hachidaime
 * @package app/core
 */
class Request
{
    /**
     * getPath
     *
     * @return void
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        return $position === false ? $path : substr($path, 0, $position);
    }

    /**
     * getMethod
     *
     * @return void
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
?>
