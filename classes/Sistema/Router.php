<?php
namespace Sistema;

class Router 
{
    static function getRoutes(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        array_shift($routes);
        array_shift($routes);
        array_shift($routes);

        $lastRoute = $routes[count($routes) - 1];
        $lastRouteURI = explode("?", $lastRoute)[0];
        array_pop($routes);
        array_push($routes, $lastRouteURI);
        
        return $routes;
    }

    static function route(){
        $routes = Router::getRoutes();

        View::render($routes);
    }
}

$router = new Router();