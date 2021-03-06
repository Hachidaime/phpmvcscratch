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
    public Controller $controller;
    public Database $db;

    /**
     * Application __construct
     *
     * @return void
     */
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
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

    /**
     * getController
     *
     * @return app\core\Controller
     */
    public function getController(): \app\core\Controller
    {
        return $this->controller;
    }

    /**
     * setController
     *
     * @param  mixed $controller
     * @return void
     */
    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }
}
?>
