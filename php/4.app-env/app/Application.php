<?php

namespace App;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use League\Container\Container;

class Application
{
    public static $static;
    protected $container;
    protected $basePath, $baseUrl;
    
    protected $bootstrapWith = [
        Bootstrap\LoadComponents::class,
    ];
    
    public function basePath () {
        return $this->basePath;
    }
    
    public function container ($make = null) {
        if ($make == null) {
            return $this->container;
        }
        
        return $this->container->get($make);
    }
    
    public function bootstrap () {
        foreach ($this->bootstrapWith as $value) {
            $boot = new $value;
            $boot($this->container);
        }
    }
    
    public function __construct ($settings)
    {
        self::$static = $this;
        
        $this->basePath = $settings['basePath'];
        $this->baseUrl = $settings['baseUrl'];
        $this->container = new Container;
        
        $this->container->share('path.base', $this->basePath());
        $this->container->share('path.url', $this->baseUrl);
        $this->container->share('path.app', $this->basePath().'/app');
        $this->container->share('path.view', $this->container->get('path.base').'/views');
        $this->container->share('path.storage', $this->container->get('path.base').'/storage');
        $this->container->share('path.cache', $this->container->get('path.base').'/storage/cache');
        
        $this->bootstrap();
    }
    
    public function get($pattern, $callback) {
	    return $this->addRoute('GET', $pattern, $callback);
    }
    
    public function post($pattern, $callback) {
    	return $this->addRoute('POST', $pattern, $callback);
    }
    
    public function put($pattern, $callback) {
    	return $this->addRoute('PUT', $pattern, $callback);
    }
    
    public function patch($pattern, $callback) {
    	return $this->addRoute('PATCH', $pattern, $callback);
    }
    
    public function delete($pattern, $callback) {
    	return $this->addRoute('DELETE', $pattern, $callback);
    }
    
    public function head($pattern, $callback) {
    	return $this->addRoute('HEAD', $pattern, $callback);
    }
    
    public function options($pattern, $callback) {
    	return $this->addRoute('OPTIONS', $pattern, $callback);
    }
    
    protected function pattern($pattern) {
        $baseUrl = $this->container('path.url');
        if (substr($pattern, 0, 1) != '/') {
            $pattern = '/'.$pattern;
        }
        return $baseUrl.$pattern;
    }
    
    public function group($pattern, $callback) {
        return $this->container->get('router')->group($this->pattern($pattern), $callback);
    }
    
    protected function addRoute($method, $pattern, $callback) {
        return $this->container->get('router', [$this->container])->map($method, $this->pattern($pattern), $callback);
    }
    
    public function run () {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
            
        $response = $this->container->get('router')->dispatch($this->container->get('request'), $this->container->get('response'));
        $data = $this->container->get('emitter')->emit($response);
    }
}