<?php

namespace Core;

class Request
{
    private $queryParams = [];
    private $bodyParams = [];
    private $url;
    private $method;

    public function __construct()
    {
        $this->queryParams = $_GET;
        $this->bodyParams = $_POST;
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getParam()
    {
        return $this->bodyParams;
    }

    public function postParam()
    {
        return $this->bodyParams;
    }

    public function getQueryParam($name)
    {
        if (isset($this->queryParams[$name])) {
            $this->queryParams[$name] = trim($this->queryParams[$name]);
            $this->queryParams[$name] = stripslashes($this->queryParams[$name]);
            $this->queryParams[$name] = htmlspecialchars($this->queryParams[$name]);
            return $this->queryParams[$name];
        } else {
            return null;
        }
    }


    public function getBodyParam($name)
    {
        if (isset($this->bodyParams[$name])) {
            $this->bodyParams[$name] = trim($this->bodyParams[$name]);
            $this->bodyParams[$name] = stripslashes($this->bodyParams[$name]);
            $this->bodyParams[$name] = htmlspecialchars($this->bodyParams[$name]);
            return $this->bodyParams[$name];
        } else {
            return null;
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }
}
