<?php

namespace Tiro\Interfaces;

use RuntimeException;
use InvalidArgumentException;

interface RouterInterface
{
    public function map($methods, $pattern, $handler);   
    // public function dispatch(ServerRequestInterface $request);  
    // public function pushGroup($pattern, $callable);   
    // public function popGroup();    
    // public function getNamedRoute($name); 
}



// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
