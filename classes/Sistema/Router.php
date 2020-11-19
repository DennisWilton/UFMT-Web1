<?php
namespace Sistema;

class Router 
{
    static function getRoutes(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        array_shift($routes);
        array_shift($routes);
        array_shift($routes);

        return $routes;
    }

    static function route(){
        $routes = Router::getRoutes();

        View::render($routes);
    }
}

$router = new Router();