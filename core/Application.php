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
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;

    /**
     * Application __construct
     *
     * @return void
     */
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}
?>
