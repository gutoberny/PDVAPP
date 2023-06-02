<?php

namespace App\Http;

use \Closure;
use \Exception;
class Router {

    /**
     * URL complete 
     */
    private $url = '';

    /**
     * Prefix of all routes
     */
    private $prefix = '';

    /**
     * Index of routes
     */
    private $routes = [];

    /**
     * Instance of Request
     */
    private $request;

    /**
     * Method responsable to start a class
     */
    public function __construct($url) {
        $this->request  = new Request();
        $this->url      = $url;
    }

    /**
     * Method responsable to define routes prefix 
     */
    public function setPrefix() {
        $parseUrl = parse_url($this->url);

        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Method responsable to insert a route on class
     */
    private function addRoute($method, $route, $params = []) {
        foreach($params as $key => $value) {
            if($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //Standard validation of URL
        $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';

        //Insert route on class
        $this->routes[$patternRoute][$method] = $params;


    }
    /**
     * Method responsable to define GET route
     */
    public function get($route, $params = []) {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Return URI without prefix
     */
    private function getUri() {
        $uri = $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        return end($xUri);
    }

    /**
     * Method responsable to return data os route
     */
    private function getRoute() {
        //URI
        $uri = $this->getUri();

        //METHOD
        $httpMethod = $this->request->getHttpMethod();

        foreach($this->routes as $patternRoute => $methods) {
            if(preg_match($patternRoute, $uri)) {
                if($methods[$httpMethod]) {
                    return $methods[$httpMethod];
                }

                throw new Exception("Method Invalid", 405);
            }
        }
        
        throw new Exception("URL not found", 404);
    }

    /**
     * Method responsable to execute the actual route
     * @return Response
     */
    public function run(){
        try{
            $route= $this->getRoute();
        }catch(Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}