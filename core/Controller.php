<?php


namespace core;


use core\Application;

class Controller
{
    public string $layout = 'main';

    /**
     * override the layout
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * set view according to the controller
     * @param $view
     * @param string $title
     * @param array $params
     * @return array|false|string|string[]
     */
    public function render($view, string $title = 'Hello, World!', array $params = [])
    {
        return Application::$app->router->renderView($view, $title, $params);
    }

}