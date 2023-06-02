<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Http\Response;
use \App\Controller\Pages\Home;

define('URL', 'http://localhost:8080/PDVAPP');

$obRouter = new Router(URL);

//Home Route

$obRouter->get('/', [
    function(){
        return new Response(200, Home::getHome());
    }
]);

/**
 * Print response of route
 */
$obRouter   ->run()
            ->sendResponse();