<?php

namespace Jamshid\ExamProject;

class Router {
    private array $routes = [];

    public function add($route, $callback): void
    {
        $this->routes[$route] = $callback;
    }

    public function get($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
        }
    }
    public function dispatch($url) {
        foreach ($this->routes as $route => $callback) {
            if ($url === $route) {
                return call_user_func($callback);
            }
        }
        http_response_code(404);
        echo "404 Not Found";
        exit;
    }
}
