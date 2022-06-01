<?php

namespace app\services;

class Router
{
    private static array $routes = [];

    public static function page(string $uri, string $page)
    {
        self::$routes[] = [
            'uri' => $uri,
            'page' => $page
        ];
    }

    public static function enable()
    {
        $query = '/' . $_GET['query'];
        foreach (self::$routes as $route) {
            if ($route['uri'] === $query) {
                $_GET['query'] = '';
                require_once 'views/' . $route['page'];
                die();
            }
        }
        $overlap = [];
        foreach (self::$routes as $route) {
            if ($route['uri'] !== '/' && ($p = mb_strpos($query, $route['uri'])) !== false && $p === 0 && $query[mb_strlen($route['uri'])] === '/') {
                if (empty($overlap) || (mb_strlen($overlap['uri']) < mb_strlen($route['uri']))) {
                    $overlap = $route;
                }
            }
        }
        if (!empty($overlap)) {
            $_GET['query'] = mb_substr($query, mb_strlen($overlap['uri']) + 1);
            require_once 'views/' . $overlap['page'];
            die();
        }
        echo '404: Page not found'; //TODO add error page
    }
}