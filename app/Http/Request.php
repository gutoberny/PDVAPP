<?php

namespace App\Http;

class Request {

    private $httpMethod;

    private $uri;

    private $router;

    /**
     * Params URL ($_GET)
     */
    private $queryParams = [];

    /**
     * Vars on POST of page ($_POST)
     */
    private $postVars = [];

    /**
     * header of req
     */
    private $headers = [];

    public function __construct($router) {
        $this->router = $router;
        $this->queryParams  = $_GET ?? [];
        $this->postVars     = $_POST ?? [];
        $this->headers      = getallheaders(); 
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->setUri();
    }

    /**
     * Method responsable to define URI
     */
    private function setUri(){
        $this->uri          = $_SERVER['REQUEST_URI'] ?? '';

        //remove GETs from URI
        $xURI = explode('?', $this->uri);
        $this->uri = $xURI[0];
    }

    /**
     * Method responsable to return Router
     */
    public function getRouter() {
        return $this->router;
    }

    /**
     * Method responsable to return HTTP of requisition
     */
    public function getHttpMethod() {
        return $this->httpMethod;
    }

    /**
     * Method responsable to return URI of requisition
     */
    public function getUri() {
        return $this->uri;
    }
    
    /**
     * Method responsable to return Headers of requisition
     */
    public function getHeaders() {
        return $this->headers;
    }
    
    /**
     * Method responsable to return parameters of requisition
     */
    public function getQueryParams() {
        return $this->queryParams;
    }
    
    /**
     * Method responsable to return Variables POST of requisition
     */
    public function getPostVars() {
        return $this->postVars;
    }

}