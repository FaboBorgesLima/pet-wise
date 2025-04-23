<?php

namespace App\Models;

class Router
{
    /**
     * Summary of routes
     * @var array<string, Route>
     */
    private static array $routes = [];
    public static function get(string $path, $cl, string $cl_method)
    {
        Router::$routes[] = new Route($path, "GET", $cl, $cl_method);
    }

    public static function post(string $path, $cl, string $cl_method)
    {
        Router::$routes[] = new Route($path, "POST", $cl, $cl_method);
    }

    public static function run()
    {
        $req = new Request(parse_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", PHP_URL_PATH), $_SERVER["REQUEST_METHOD"], $_POST, $_GET);
        foreach (Router::$routes as $route) {
            if (($route->path == $req->path || $route->path . '/' == $req->path) && $route->method == $req->method) {

                $route->run($req);
                return;
            }
        }
    }
}
