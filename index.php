<?php

define('ROOT', __DIR__);
define('VIEWS', __DIR__ . '/views' );
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
define('ASSETS', $protocol . $_SERVER['HTTP_HOST'].'/assets');


require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


use Pecee\SimpleRouter\SimpleRouter;

/* Load external routes file */
require_once __DIR__. '/routes/routes.php';

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

SimpleRouter::setDefaultNamespace('\App\Controllers');

// Start the routing
SimpleRouter::start();