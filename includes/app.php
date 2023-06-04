<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Utils\View;
use \WilliamCosta\DatabaseManager\Database;
use \WilliamCosta\DotEnv\Environment;

Environment::load(__DIR__);
echo "<pre>";
print_r(getenv('DB_NAME'));
echo "<pre>"; 
exit;
//Define conf db
Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_PORT'),
);

//Define const URL
define('URL', getenv('URL'));

/**
 * Define the default value of vars
 */
View::init([
    'URL' => URL
]);