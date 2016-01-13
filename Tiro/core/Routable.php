<?php

namespace Tiro\core;

use Exception;
use Interop\Container\ContainerInterface;

abstract class Routable
{
    protected $container;

    public function setContainer(ContainerInterface $container) {
        $this->container = $container;
        return $this;
    }
}
// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
