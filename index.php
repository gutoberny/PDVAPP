<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

define('URL', 'http://localhost:8080');

/**
 * Define the default value of vars
 */
View::init([
    'URL' => URL
]);

/**
 * Initiate the Router
 */
$obRouter = new Router(URL);

include __DIR__.'/routes/pages.php';

/**
 * Print response of route
 */
$obRouter->run()
         ->sendResponse();