<?php

$app = new Silex\Application();

$app['autoloader']->registerNamespace('Snippet', __DIR__);

/**
 * Silex Extensions
 */
$app->register(new Silex\Provider\SymfonyBridgesServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider(), array(
    'form.path' => __DIR__.'/../vendor/Symfony/Component'
));
$app->register(new Silex\Provider\ValidatorServiceProvider(), array(
    'validator.path' => __DIR__.'/../vendor/Symfony/Component'
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'       => array(
        __DIR__.'/Resources/views',
        __DIR__.'/../vendor/Symfony/Bridge/Twig/Resources/views'
    ),
    'twig.class_path' => __DIR__.'/../vendor/Twig/lib',
    'twig.options'    => array('cache' => __DIR__.'/../cache'),
));

// Connect Snippet's controllers.
$app->mount(null, new Snippet\Provider\SnippetControllerProvider());

$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.html.twig'));
});

return $app;
