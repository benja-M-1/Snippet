<?php

require_once __DIR__.'/../vendor/Silex/autoload.php';

$app = require_once __DIR__.'/../src/app.php';
$app['debug'] = true;
$app->run();
