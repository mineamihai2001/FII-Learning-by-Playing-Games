<?php
class Router
{
    static $routes = [];
    static $get_routes = [];

    static function post(string $path, callable $callback)
    {
        self::$routes[$path] = $callback;
    }
    static function get(string $path, callable $callback)
    {
        self::$get_routes[$path] = $callback;
    }
    static function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $found = false;
        foreach (self::$routes as $path => $callback) { // POST
            if ($path !== $uri) continue;

            $found = true;
            $callback();
        }

        if (isset($_SERVER['QUERY_STRING'])) { // GET
            foreach (self::$get_routes as $path => $callback) {
                $params = $_SERVER['QUERY_STRING'];
                $params = explode("&", $params);
                $result = array();
                $uri_params = array();
                foreach ($params as $p) {
                    $p = explode("=", $p);
                    if (sizeof($p) >= 2 && $p[0] && $p[1]) {
                        $key = $p[0];
                        $value = $p[1];
                        $result[$key] = $value;
                        array_push($uri_params, $value);
                    }
                }

                $route_params = explode("?", $path)[1];
                $route_params = explode("&", $route_params);
                $route_values = array();
                foreach ($route_params as $rp) {
                    $val = explode("=", $rp)[1];
                    array_push($route_values, $val);
                }

                $new = str_replace($uri_params, $route_values, $uri);

                if ($path != $new) continue;

                $found = true;
                $callback();
            }
        }

        if (!$found) {
            $notFoundCallback = self::$routes['/application/404'];
            $notFoundCallback();
        }
    }

    public static function redirect($url = null) {
        if($url) {
            header('Location: http://localhost:8000' . $url );
            die();
        } 
        header('Location: http://localhost:8000/application/');
        die();
    }
}
