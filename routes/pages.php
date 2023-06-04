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

//Products
$obRouter->get('/products', [
    function($idPage){
        return new Response(200, Pages\Products::getProducts());
    }
]);

//Product New
$obRouter->get('/productNew', [
    function($idPage){
        return new Response(200, Pages\ProductNew::getProductNew());
    }
]);

//Product Registration (INSERT)
$obRouter->post('/productNew', [
    function($request){
        return new Response(200, Pages\ProductNew::insertProduct($request));
    }
]);