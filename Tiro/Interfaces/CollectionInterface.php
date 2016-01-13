<?php

namespace Tiro\Interfaces;

interface CollectionInterface extends \ArrayAccess, \Countable, \IteratorAggregate
{
    public function set($key, $value);
    public function get($key, $default = null);
    public function replace(array $items);
    public function all();
    public function has($key);
    public function remove($key);
    public function clear(); 
}



// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
