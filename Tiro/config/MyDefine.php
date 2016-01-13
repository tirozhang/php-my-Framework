<?php
namespace system\config;

/**
 * 全局变量操作静态类
 *
 * @author tirozhang
 */
class MyDefine
{
    /**
     * 设置全局变量
     */
    public static function init()
    {
        defined('IS_LOG') or define('IS_LOG', true);
        defined('DS') or define('DS', DIRECTORY_SEPARATOR);
    }
}



// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
