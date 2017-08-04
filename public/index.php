<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

require APP . 'config/config.php';

/* TODO: setup autoload and namespace instead. */
require APP . 'Application.php';
require APP . 'Controller.php';

$app = new Application();
