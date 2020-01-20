<?php

use Application\Psr4AutoloaderClass;

require_once(__DIR__ . '/Psr4AutoloaderClass.php');

$loader = new Psr4AutoloaderClass();
$loader->addNamespace('Application', __DIR__);
$loader->register();
