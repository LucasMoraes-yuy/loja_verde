<?php

namespace application\core;


class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $page404 = false;
    protected $params = [];

    public function __construct() {
        $URL_ARRAY = $this->parseUrl();
        $this->getControllerFromUrl($URL_ARRAY);
        $this->getMethodFromUrl($URL_ARRAY);
        $this->getParamsFromUrl($URL_ARRAY);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        // só assim para funcionar no meu
        $uri = $_SERVER['REQUEST_URI'];
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, '/');
        return explode('/', $uri);

        // $REQUEST_URI = explode('/', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1));
        // echo "To aqui";
        // var_dump($REQUEST_URI);
        // return $REQUEST_URI;
    }

    public function getControllerFromUrl($url) {
        if (!empty($url[0]) && isset($url[0])) {
            if (file_exists('../application/controllers/')
                .ucfirst($url[0])
                .'Controller.php') {
                $this->controller = ucfirst($url[0]).'Controller';
            } else {
                $this->page404 = true;
            }
        } 

        require_once '../application/controllers/' . 
            $this->controller . '.php';
            $this->controller = new $this->controller();
    }

    private function getMethodFromUrl($url) {
        if(!empty($url[1]) && isset($url[1])) {
            if (method_exists($this->controller, $url[1]) && !$this->page404) {
                $this->method = $url[1];
            } else {
                $this->method = 'pageNotFound';
            }
        }
    }

    private function getparamsFromUrl($url) {
        if (count($url) > 2) {
            $this->params = array_slice($url, 2);
        }
    }
}
