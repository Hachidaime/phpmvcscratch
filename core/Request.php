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
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * isGet
     *
     * @return void
     */
    public function isGet()
    {
        return $this->method() === 'get';
    }

    /**
     * isPost
     *
     * @return void
     */
    public function isPost()
    {
        return $this->method() === 'post';
    }

    /**
     * getBody
     *
     * @return void
     */
    public function getBody()
    {
        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(
                    INPUT_GET,
                    $key,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }
        }

        if ($this->method() === 'post') {
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
