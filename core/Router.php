<?php

namespace core;

class Router
{

    /**
     * Router constructor.
     */
    protected array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * set controller and callback for get requests
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * set controller and callback for post requests
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * resolve request
     * @return array|false|mixed|string|string[]
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {  // if callback is not found
            Application::$app->response->setStatusCode(404);
            return $this->renderOnlyView("_404");
        }
        if (is_string($callback)) { //if callback is just a static page render view only
            return $this->renderStaticView($callback, title: "Hello World");
            //return $this->renderView($callback, title: "Hello World");
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);   // Execute callback
    }

    /**
     * render the completed view with the layout and the view content
     * @param $view
     * @param $title
     * @param array $params
     * @return array|string|string[]
     */
    public function renderView($view, $title, array $params = [])
    {
        $layoutContent = $this->layoutContent();
        $layoutContent = str_replace('{{title}}', $title, $layoutContent);
        $viewContent = $this->renderOnlyView($view, $params);
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * render the completed view with the layout and the view content
     * @param $view
     * @param $title
     * @param array $params
     * @return array|string|string[]
     */
    public function renderStaticView($view, $title, array $params = [])
    {
        $layoutContent = $this->loadlayoutContent('reset');
        $layoutContent = str_replace('{{title}}', $title, $layoutContent);
        $viewContent = $this->renderOnlyView($view, $params);
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * select the main layout of the page
     * @return false|string
     */
    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    /**
     * select the main layout of the page
     * @return false|string
     */
    protected function loadlayoutContent($layout)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    /**
     * return the view and params
     * @param $view
     * @param array $params
     * @return false|string
     */
    protected function renderOnlyView($view, array $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}