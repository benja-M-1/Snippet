<?php

require_once __DIR__.'/../vendor/silex.phar';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'       => __DIR__.'/views',
    'twig.class_path' => __DIR__.'/../vendor/Twig/lib',
));

// Include Snippet.
$app['autoloader']->registerNamespace('Snippet', __DIR__);

// Connect Snippet's controllers.
$app->mount('/snippet', new Snippet\SnippetControllerProvider());

$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.html.twig'));
});

return $app;
