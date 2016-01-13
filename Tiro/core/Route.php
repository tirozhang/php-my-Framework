<?php

namespace Tiro\core;

use Exception;
use InvalidArgumentException;
use Tiro\core\Routable;
use Tiro\Interfaces\RouteInterface;

class Route extends Routable implements RouteInterface 
{

    protected $outputBuffering = 'append'; 

    protected $identifier;

    public function __construct($methods, $pattern, $callable, $groups = [], $identifier = 0)
    {
        $this->methods = $methods;
        $this->pattern = $pattern;
        $this->callable = $callable;
        $this->groups = $groups;
        $this->identifier = $identifier;
    }

    public function setOutputBuffering($mode) {
        if (!in_array($mode, [false, 'prepend', 'append'], true)) {
            throw new InvalidArgumentException('Unknown output buffering mode');
        }
        $this->outputBuffering = $mode;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }
}


// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
