<?php

/**
 * Configuration
 */
define('ENVIRONMENT', 'dev');

if (ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}
