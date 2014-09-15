#!/usr/bin/env php
<?php

define('SCRIPT_NAME', __FILE__);
$files = array(
    __DIR__ . '/../../vendor/autoload.php',
    __DIR__ . '/../../../autoload.php',
    __DIR__ . '/vendor/autoload.php'
);

$found = false;

foreach ($files as $file) {
    if (file_exists($file)) {
        require $file;
        $found = true;
        break;
    }
}

if (!$found) {
    die(
        'You need to set up the project dependencies using the following commands:' . PHP_EOL .
        'curl -s http://getcomposer.org/installer | php' . PHP_EOL .
        'php composer.phar install' . PHP_EOL
    );
}


use Liuggio\Fastest\Application;
use Liuggio\Fastest\AppParametersFromEnv;

$parameters = new AppParametersFromEnv();

$application = new Application($parameters);
$application->run();