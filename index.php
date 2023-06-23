<?php

use Core\Controller;
use Core\Core;

error_reporting(E_ALL);
ini_set("display_errors", 1);

define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

$app = new Core();
$app->run();

echo Controller::$_render;