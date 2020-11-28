<?php

namespace app\core;

/**
 * Class Router
 *
 * @author Hachidaime
 * @package app\core
 */

class Router
{
    public Request $request;
    protected array $routes = [];

    /**
     * Router constructor.
     *
     * @param app\core\Request $request
     */
    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

    /**
     * get
     *
     * @param  mixed $path
     * @param  mixed $collback
     * @return void
     */
    public function get($path, $collback)
    {
        $this->routes['get'][$path] = $collback;
    }

    /**
     * resolve
     *
     * @return void
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo 'Not found';
            exit();
        }

        echo call_user_func($callback);
    }
}
?>
