<?php

use \system\core\App;

date_default_timezone_set('Asia/Shanghai');

define('FRAMEWORK_BASE_PATH', dirname(__FILE__));
require_once FRAMEWORK_BASE_PATH . '/vendor/autoload.php';

App::registry(__DIR__.'/app');
App::run();


// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
