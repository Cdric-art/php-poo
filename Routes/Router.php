<?php

namespace Router;

use App\Exceptions\NotFoundException;

class Router
{

    public string $url;
    public array $routes = [];

    public function __construct(string $url)
    {
        $this->url = trim($url, '/');
    }

    public function getUrl(string $path, string $action): void
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function post(string $path, string $action): void
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }

        throw new NotFoundException();
    }
}
