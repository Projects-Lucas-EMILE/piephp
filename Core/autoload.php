<?php
function inPlace($class)
{
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once($path);
    }
}

function inCore($class)
{
    $path = 'Core/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once($path);
    }
}

function inSrc($class)
{
    $path = 'src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once($path);
    }
}

function inSrcModel($class)
{
    $path = 'src/Model' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once($path);
    }
}

function inSrcController($class)
{
    $path = 'src/Controller' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once($path);
    }
}

function inSrcView($class)
{
    $path = 'src/View' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once($path);
    }
}

spl_autoload_register('inPlace');
spl_autoload_register('inCore');
spl_autoload_register('inSrc');
spl_autoload_register('inSrcModel');
spl_autoload_register('inSrcController');
spl_autoload_register('inSrcView');