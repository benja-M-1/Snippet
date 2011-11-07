<?php

require_once __DIR__.'/../vendor/silex.phar';

$app = require_once __DIR__.'/../src/app.php';
$app->run();
