<?php

//namespace Core;
//
//class Core
//{
//    public function run()
//    {
//        require_once(implode(DIRECTORY_SEPARATOR, ['src', 'routes.php']));
//        $BASE_URL = "/localhost_piephp";
//        $requested_url = substr($_SERVER["REQUEST_URI"], strlen($BASE_URL));
//        $routerCall = Router::get($requested_url);
//
//        if ($routerCall != null) {
//            $controllerClass = '\Controller\\' . $routerCall["controller"] . 'Controller';
//            if (class_exists($controllerClass)) {
//                $controller = new $controllerClass();
//                $action = $routerCall['action'] . 'Action';
//                if (method_exists($controller, $action)) {
//                    $controller->$action();
//                }
//            }
//        }
//    }
//}

namespace Core;

class Core
{
    public function run()
    {
        $BASE_URL = "/localhost_piephp";
        $requested_url = substr($_SERVER["REQUEST_URI"], strlen($BASE_URL));
        $segments = explode('/', trim($requested_url, '/'));
        $controllerClass = '\Controller\\' . (isset($segments[0]) && !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'AppController');
        $action = isset($segments[1]) && !empty($segments[1]) ? $segments[1] . 'Action' : 'indexAction';
        $args = count($segments) <= 2 ? [] : array_slice($segments, 2);
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $action)) {
                $controller->$action($args);
            }
        }
    }
}

