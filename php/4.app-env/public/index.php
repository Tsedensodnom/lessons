<?php

require_once(__DIR__.'/../app/helpers.php');
$loader = require('../vendor/autoload.php');
$loader->setPsr4('App\\', __DIR__.'/../app');

$app = new \App\Application([
  'basePath' => realpath(__DIR__.'/../'),
  'baseUrl' => '/php/4.container/public',
]);

$app->get('/', function ($request, $response) {
  return render($response, 'home.twig', []);
});

$app->get('/home', function ($request, $response) {
  return render($response, 'index.twig', []);
});

$group = $app->group('/admin', function($group) {
  $group->get('/', function ($request, $response, $args) {
    return $response;
  });
  $group->get('/hello', function ($request, $response, $args) {
    echo '/admin/hello';
    return $response;
  });
});

$app->run();