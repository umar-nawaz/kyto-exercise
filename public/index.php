<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

require APP . 'config/config.php';

require APP . 'Application.php';
require APP . 'Controller.php';

$app = new Application();
