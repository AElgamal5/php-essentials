<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    private $routes = [];

    private function addRoute(string $method, string $uri, string $controller, string $middleware = null): Router
    {
        $this->routes[] = compact('method', 'uri', 'controller', 'middleware');
        return $this;
    }

    public function get(string $uri, string $controller): Router
    {
        return $this->addRoute('GET', $uri, $controller);

    }

    public function post(string $uri, string $controller): Router
    {
        return $this->addRoute('POST', $uri, $controller);
    }

    public function put(string $uri, string $controller): Router
    {
        return $this->addRoute('PUT', $uri, $controller);
    }

    public function patch(string $uri, string $controller): Router
    {
        return $this->addRoute('PATCH', $uri, $controller);
    }

    public function delete(string $uri, string $controller): Router
    {
        return $this->addRoute('DELETE', $uri, $controller);
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require basePath('HTTP/Controllers/' . $route['controller']);
            }
        }
        abort();
    }

    public function only(string $key): void
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }


    public function perviousUrl(string $default = '/'): string
    {
        return $_SERVER['HTTP_REFERER'] ?? $default;
    }

}
