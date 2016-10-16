<?php

if (!function_exists('app')) {
    function app($make = null) {
        if ($make == null) {
            return \App\Application::$static;
        } else {
            return \App\Application::$static->container($make);
        }
    }
}

if (!function_exists('container')) {
    function container($make = null) {
        if ($make == null) {
            return app()->container();
        } else {
            return app()->container($make);
        }
    }
}

if (!function_exists('render')) {
    function render($response, $view, $data) {
        $html = app('twig')->render($view, $data);
        $response->getBody()->write($html);
        return $response;
    }
}

?>