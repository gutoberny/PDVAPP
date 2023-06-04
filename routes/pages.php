<?php

use \App\Http\Response;
use \App\Controller\Pages;

//Home
$obRouter->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);

//About
$obRouter->get('/about', [
    function(){
        return new Response(200, Pages\About::getAbout());
    }
]);

//Dinamic
$obRouter->get('/products', [
    function($idPage){
        return new Response(200, Pages\Products::getProducts());
    }
]);