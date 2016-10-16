<?php

namespace App\Bootstrap;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoadComponents {
    public function __invoke ($app) {
        $app->share('response', \Zend\Diactoros\Response::class);
        $app->share('request', function () {
            return \Zend\Diactoros\ServerRequestFactory::fromGlobals(
                $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
            );
        });
        $app->share('emitter', \Zend\Diactoros\Response\SapiEmitter::class);
        $app->share('router', function () { return new \League\Route\RouteCollection(container()); });
        $app->share('twig', function () {
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(container('path.view'));
            $twig = new \Twig_Environment($loader, array(
                'cache' => container('path.cache').'/views',
            ));
            return $twig;
        });
    }
}