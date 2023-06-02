<?php

namespace App\Http;

class Response {

    /**
     * Code of status HTTP
     */
    private $httpCode = 200;

    /**
     * Headers response
     */
    private $headers = [];

    /**
     * type of return content 
     */
    private $contentType = 'text/html';

    /**
     * Content of Response
     */
    private $content;

    /**
     * Method responsable to start class and define the values
     */
    public function __construct($httpCode, $content, $contentType = 'text/html') {
        $this->httpCode = $httpCode;
        $this->content  = $content;
        $this->setContentType($contentType);
    }

    /**
     * Method responsable to change content type of response
     */
    public function setContentType($contentType) {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }
    
    /**
     * Method responsable to put info on header of response
     */
    public function addHeader($key, $value) {
        $this-> headers[$key] = $value; 
    }

    /**
     * Method responsable to send headers to browser
     */
    private function sendHeaders() {
        http_response_code($this->httpCode);

        foreach($this->headers as $key => $value) {
            header($key . ': '. $value);
        }
    }

    /**
     * Method responsable to send a response to user
     */
    public function sendResponse() {
        //Send headers
        $this->sendHeaders();

        //Print content
        switch($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}