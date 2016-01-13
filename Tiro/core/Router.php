<?php

namespace Tiro\core;

use RuntimeException;
use InvalidArgumentException;
use Tiro\core\Route;
use Tiro\Interfaces\RouterInterface;
use FastRoute\Dispatcher;
use FastRoute\RouteParser;
use FastRoute\RouteParser\Std as StdParser;

class Router implements RouterInterface 
{
protected $routeParser;

protected $routeGroups;

    protected $routeCounter;

    protected $routes;

    public function __construct(RouteParser $parser = null)
    {
        $this->routeParser = $parser ?: new StdParser;
    }

    public function map($methods, $pattern, $handler)
    {
        if (!is_string($pattern)) {
            throw new InvalidArgumentException('Route pattern must be a string');
        }
        $methods = array_map("strtoupper", $methods); 
        $route = new Route($methods, $pattern, $handler, $this->routeGroups, $this->routeCounter);
        $this->routes[$route->getIdentifier()] = $route; 
        $this->routeCounter++; 

        return $route;  
    }

}


// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
