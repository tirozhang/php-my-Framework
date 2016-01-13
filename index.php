<?php

define('FRAMEWORK_BASE_PATH', dirname(__FILE__));
require_once FRAMEWORK_BASE_PATH . '/vendor/autoload.php';

$app = new Tiro\App();

$app->get('/', function ($request, $response, $args) {
    $response->write("Welcome to Slim!");
    return $response;
});

$app->run();

// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
