<?php


namespace App\Core;

use FastRoute;
use FastRoute\RouteCollector;

class Route
{
    const CONTROLLER_PATH = "App\Controllers\\";
    private static $dispatcher;

    /**
     * Start Routing
     */
    public static function start()
    {
        self::registerRoute();
        self::runController();
    }

    /**
     * for example : $requset = '/user/all'
     * @param string $request
     */
    public static function redirect( $request = '')
    {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri$request");
        exit;
    }

    private static function runController()
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = self::$dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // TODO: make case
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                // TODO: make case
                self::redirect('/');
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                list($class, $method) = explode('@', $handler, 2);
                $controller = self::CONTROLLER_PATH . $class;
                $controller = new $controller;
                $controller->$method();
                break;
        }
    }

    private static function registerRoute()
    {
        self::$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
            $r->addRoute('GET', '/', 'Main@index');
            $r->addRoute('GET', '/register/user', 'UserRegister@showRegisterForm');
            $r->addRoute('POST', '/register/user/save', 'UserRegister@saveUser');
            $r->addRoute('GET', '/user/login', 'Auth@showLoginForm');
            $r->addRoute('POST', '/user/login/run', 'Auth@login');
            $r->addRoute('GET', '/user/logout', 'Auth@logout');
        });
    }

}
