<?php
namespace system\core;

use \system\config\MyDefine;

/**
 * Framework App核心   
 */
class App
{

    public static $baseRoot;
    public static $appRoot;
    
    public static function registry($appPath)
    {
        self::$baseRoot = dirname(__DIR__);
        if (is_readable($appPath)) {
            self::$appRoot = $appPath; 
        }else{
            die(1000);
        }
        self::init();
    }

    public static function init()
    {
        MyDefine::init();
        //self::$controller = TXFactory::create('TXController');
    }

    public static function run()
    {
        // self::$controller->dispatcher();
    }
}


// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
