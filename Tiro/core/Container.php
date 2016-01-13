<?php

namespace Tiro\core;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Pimple\Container as PimpleContainer;
use Tiro\Exception\ContainerValueNotFoundException;
use Tiro\core\Router;
use Tiro\Http\Environment; 
use Tiro\Http\Headers;
use Tiro\Http\Request;
use Tiro\Http\Response;

class Container extends PimpleContainer implements ContainerInterface
{
    private $defaultSettings =[
        'httpVersion' => '1.1',
        'outputBuffering' => 'append',
    ];    

    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $userSettings = isset($values['settings']) ? $values['settings'] : []; 
        $this->registerDefaultServices($userSettings);  
    }

    public function registerDefaultServices($userSettings)
    {
        $defaultSettings = $this->defaultSettings;

        $this['settings'] = function () use ($userSettings, $defaultSettings) {
            return new Collection(array_merge($defaultSettings, $userSettings));
        };

        if (!isset($this['environment'])) {
            $this['environment'] = function () {
                return new Environment($_SERVER);
            };
        }
        if (!isset($this['request'])) {
            $this['request'] = function ($c) {
                return Request::createFromEnvironment($c->get('environment'));  
            };
        }
        if (!isset($this['response'])) {
            $this['response'] = function ($c) {
                $headers = new Headers(['Content-Type' => 'text/html; charset=UTF-8']);
                $response = new Response(200, $headers);
                return $response->withProtocolVersion($c->get('settings')['httpVersion']);
            };
        }

        if (!isset($this['router'])) {
            $this['router'] = function () { 
                return new Router;
            };
        }
    }

    public function get($id)
    {
        if (!$this->offsetExists($id)) {  
            throw new ContainerValueNotFoundException(sprintf('Identifier "%s" is not defined.', $id));
        }
        return $this->offsetGet($id);
    }

    public function has($id)
    {
        return $this->offsetExists($id);
    }
}

// vim600:ts=4 st=4 foldmethod=marker foldmarker=<<<,>>>
// vim600:syn=php commentstring=//%s
