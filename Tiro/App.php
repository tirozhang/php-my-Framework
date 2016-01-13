<?php

namespace Tiro;

use InvalidArgumentException;
use Interop\Container\ContainerInterface;
use Tiro\core\Container;

class App
{
    private $container;

    public function __construct($container = [])
    {
        if (is_array($container)) {
            $container = new Container();
        }
        if (!$container instanceof ContainerInterface) {
            throw new InvalidArgumentException('Expected a ContainerInterface');
        }
        $this->container = $container;
    }

    public function get($pattern, $callable)
    {
        return $this->map(['GET'], $pattern, $callable);
    }

    public function map(array $methods, $pattern, $callable)
    {
        if ($callable instanceof Closure) {
            $callable = $callable->bindTo($this->container);
        }
        $route = $this->container->get('router')->map($methods, $pattern, $callable);
        if (is_callable([$route, 'setContainer'])) {
            $route->setContainer($this->container);
        }
        if (is_callable([$route, 'setOutputBuffering'])) {
            $route->setOutputBuffering($this->container->get('settings')['outputBuffering']);
        }
        return $route; 
    }

    public function run()
    {
        $request = $this->container->get('request'); 
        $response = $this->container->get('response'); 
        $response = $this->process($request, $response);
        return $response;
    }


}

// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
