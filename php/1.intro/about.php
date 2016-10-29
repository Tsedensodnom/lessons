<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem(__DIR__.'/views');
$twig = new Twig_Environment($loader, [
    'cache' => __DIR__.'/storage/views'
]);

echo $twig->render('about.twig', [
    'title' => 'This is title',
    'content' => 'This is example content',
    'posts' => [
        [
            'url' => 'post_url',
            'title' => 'This is post title',
        ]
    ]
]);