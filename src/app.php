<?php

require_once __DIR__.'/../vendor/silex.phar';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app->get('/hello/{name}', function($name) {

    return 'Hello '.$name;
});

return $app;
