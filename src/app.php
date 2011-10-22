<?php

require_once __DIR__.'/../vendor/silex.phar';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Model
use Snippet\Model\Author;
use Snippet\Model\Snippet;

$app = new Silex\Application();
$app['debug'] = true;
$app['autoloader']->registerNamespace('Snippet', __DIR__.'/Snippet');

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'       => __DIR__.'/views',
    'twig.class_path' => __DIR__.'/../vendor/twig/lib',
));

$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.html.twig'));
});

/**
 * /hello/{name}
 *
 * Returns a hello to you :)
 *
 * @return String
 */
$app->get('/hello/{name}', function($name) {

    return 'Hello '.$name;
});

$app->get('/snippet', function() use($app) {
    $author = new Author('John Doe', 'johnd@theodo.fr');

    $snippets = array(
        new Snippet('One', 'text one', $author),
        new Snippet('Two', 'text two', $author),
        new Snippet('Three', 'text three', $author),
    );

    return $app['twig']->render('index.html.twig', array(
        'snippets' => $snippets,
    ));
});

return $app;
