<?php

namespace app\core;
/**
 * Class Controller
 *
 * @author Hachidaime
 * @package app\core
 */

class Controller
{
    public string $layout = 'main';

    /**
     * setLayout
     *
     * @param string $layout
     * @return void
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    /**
     * render
     *
     * @param  string $view
     * @param  array $params
     * @return void
     */
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}
?>
