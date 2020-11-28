<?php

namespace app\core;

/**
 * Class Application
 *
 * @author Hachidaime
 * @package app\core
 */
class Application
{
    public Router $router;
    public Request $request;

    /**
     * Application __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $this->router->resolve();
    }
}
?>
