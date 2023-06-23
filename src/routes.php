<?php

use Core\Router;

Router::connect('/', ['controller' => 'App', 'action' => 'index']);
Router::connect('/register', ['controller' => 'User', 'action' => 'register']);
Router::connect('/login', ['controller' => 'User', 'action' => 'login']);
Router::connect('/show', ['controller' => 'User', 'action' => 'show']);
Router::connect('/register', ['controller' => 'User', 'action' => 'registerUser']);