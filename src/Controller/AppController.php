<?php

namespace Controller;

use Core\Controller;
use Core\Request;

class AppController extends Controller
{
    private $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    function indexAction()
    {
        $this->render('index');
    }
}