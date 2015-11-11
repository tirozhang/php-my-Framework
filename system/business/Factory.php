<?php
namespace system\business;

/**
 * 封装对象列表
 *
 * @author tirozhang
 */

class Factory
{
    private static $objects = array();

    public static function create($class, $alias=null)
    {
        if (null === $alias) {
            $alias = $class;
        }
        if (!isset(self::$objects[$alias])) {
            self::$objects[$alias] = new $class();
        }

        return self::$objects[$alias];
    }
}

// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
