<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

require ROOT . 'vendor/autoload.php';

require APP . 'config/config.php';

use Ascii\Application;

$app = new Application();
