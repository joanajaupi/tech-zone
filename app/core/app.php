<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params;

    public function __construct()
    {
        $url = $this->parseURL();

        //check if the controller exists

        if (file_exists('../app/controllers/' . strtolower($url[0]) . '.php')) {
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }
        //require the controller file and create an instance of the controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //check if the method exists in the controller class and set it
        if(isset($url[1])){
            $url[1] = strtolower($url[1]);
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //get the parameters if any and set them in the params property of the class 
        $this->params = count($url) > 0 ? array_values($url) : [];

        //call the method and pass the parameters to it 
        call_user_func_array([$this->controller, $this->method], $this->params);

    }
    private function parseURL(){
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        return explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
        //filter_var() is a PHP function that filters a variable with a specified filter.
        //FILTER_SANITIZE_URL removes all illegal URL characters from a string.
    }
}