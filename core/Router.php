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
    public Response $response;
    protected array $routes = [];

    /**
     * __construct
     *
     * @param app/core/Request $request
     * @param app/core/Response $response
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
     * post
     *
     * @param  mixed $path
     * @param  mixed $collback
     * @return void
     */
    public function post($path, $collback)
    {
        $this->routes['post'][$path] = $collback;
    }

    /**
     * resolve
     *
     * @return void
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
    }

    /**
     * renderView
     *
     * @param  mixed $view
     * @return void
     */
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    /**
     * renderContent
     *
     * @param  mixed $viewContent
     * @return void
     */
    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    /**
     * layoutContent
     *
     * @return void
     */
    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layout/{$layout}.tpl";
        return ob_get_clean();
    }

    /**
     * renderOnlyView
     *
     * @param  mixed $view
     * @return void
     */
    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/{$view}.tpl";
        return ob_get_clean();
    }
}
