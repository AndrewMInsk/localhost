<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = require_once($routesPath);
    }

    /**
     * @return string
     */

    private function getURI()
    {
        if ($_SERVER['REQUEST_URI']) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        $uri = $this->getURI();
        foreach ($this->routes as $route => $item) {

            if (preg_match("~$route~", $uri)) {

                $internalRoute = preg_replace("~$route~", $item, $uri);

                $segments = explode("/", $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));


            }
            if (isset($actionName) && $controllerName) {

                $filename = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($filename)) {
                    require_once $filename;
                    $controller = new $controllerName();
                    if(method_exists($controller, $actionName)) {
                        echo call_user_func_array(array($controller, $actionName), $segments);
                    }

                    break;
                }
                else{
                    $controllerName = 'NotFoundController';
                    $actionName = 'actionIndex';
                    $filename = ROOT . '/controllers/' . $controllerName . '.php';
                    if (file_exists($filename)) {
                        require_once $filename;
                        $controller = new $controllerName();
                        echo $controller->$actionName();
                    }
                }

            }
        }
        if (!isset($actionName) && !isset($controllerName)) {
            $controllerName = 'NotFoundController';
            $actionName = 'actionIndex';
            $filename = ROOT . '/controllers/' . $controllerName . '.php';
            if (file_exists($filename)) {
                require_once $filename;
                $controller = new $controllerName();
                echo $controller->$actionName();
            }
        }


    }

}