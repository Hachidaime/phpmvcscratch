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

    /**
     * getBody
     *
     * @return void
     */
    public function getBody()
    {
        $body = [];
        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(
                    INPUT_GET,
                    $key,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }
        }

        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(
                    INPUT_POST,
                    $key,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }
        }

        return $body;
    }
}
?>
