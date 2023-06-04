<?php

require __DIR__.'/includes/app.php';

use \App\Http\Router;


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