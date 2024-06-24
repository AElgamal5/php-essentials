<?php

namespace Core;

class Router
{
    private $routes = [];

    private function addRoute(string $method, string $uri, string $controller)
    {
        $this->routes[] = compact('method', 'uri', 'controller');
    }

    public function get(string $uri, string $controller): void
    {
        $this->addRoute('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): void
    {
        $this->addRoute('POST', $uri, $controller);
    }

    public function put(string $uri, string $controller): void
    {
        $this->addRoute('PUT', $uri, $controller);
    }

    public function patch(string $uri, string $controller): void
    {
        $this->addRoute('PATCH', $uri, $controller);
    }

    public function delete(string $uri, string $controller): void
    {
        $this->addRoute('DELETE', $uri, $controller);
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                return require basePath($route['controller']);
            }
        }
        abort();
    }

}
