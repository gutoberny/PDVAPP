<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;

//Load environment Variables 
Environment::load(__DIR__);

//Define const URL
define('URL', getenv('URL'));

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