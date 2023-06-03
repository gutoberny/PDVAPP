<?php

namespace App\Http;

use \Closure;
use \Exception;
use  \ReflectionFunction;
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

        //Vars of Rout
        $params['variables'] = [];

        //Standard validation
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable, $route, $matches)) {
            $route = preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
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
     * Method responsable to define POST route
     */
    public function post($route, $params = []) {
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Method responsable to define PUT route
     */
    public function put($route, $params = []) {
        return $this->addRoute('PUT', $route, $params);
    }

    /**
     * Method responsable to define DELETE route
     */
    public function delete($route, $params = []) {
        return $this->addRoute('DELETE', $route, $params);
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
            if(preg_match($patternRoute, $uri, $matches)) {
                if(isset($methods[$httpMethod])) {
                    unset($matches[0]);
                    
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
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
    public function run() {
        try{
            $route= $this->getRoute();

            if(!isset($route['controller'])) {
                throw new Exception("URL can't be processed", 500);
            }

            $args = [];

            //Reflection
            $reflection = new ReflectionFunction($route['controller']);
            foreach($reflection->getParameters() as $parameter) {
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }

            return call_user_func_array($route['controller'], $args);
        }catch(Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}