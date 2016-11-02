<?php

require('vendor/autoload.php');

//error reporting
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//basePath
$basePath = mb_substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));

//little fix for normal use
if ($_SERVER['REQUEST_URI'] == $basePath) {
  $_SERVER['REQUEST_URI'] .= '/';
} elseif ($_SERVER['REQUEST_URI'] == $basePath.'/') {
} elseif (mb_substr($_SERVER['REQUEST_URI'], -1) == '/') {
  $_SERVER['REQUEST_URI'] = mb_substr($_SERVER['REQUEST_URI'], 0, -1);
}

$router = new AltoRouter();
$router->setBasePath($basePath);

$router->map('GET', '/', function () {
  return 'home page';
});

$router->map( 'GET', '/categories', function ($id) {
  return 'categories page';
});

$router->map( 'GET', '/category/[i:id]', function ($id) {
  return 'category:'.$id.' detail page';
});

$router->map( 'GET', '/posts', function () {
  return 'posts page';
});

$router->map( 'GET', '/post/[i:id]', function($id) {
  return 'post:'.$id.' detail page';
});

$router->map( 'GET', '/search', function() {
  return 'search page';
});

$match = $router->match();

//print response
if ($match && is_callable($match['target'])) {
  $data = call_user_func_array( $match['target'], $match['params'] );
  ob_clean();
  echo $data;
} else {
  echo 'Route not found';
}