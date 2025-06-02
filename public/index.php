<?php

use Core\Session;
use Core\ValidationExeption;

const BASE_PATH = __DIR__ . '//../';
require BASE_PATH . '/vendor/autoload.php';

session_start();


require BASE_PATH . 'Core/functions.php';

require base_path('Core/router.php');
require base_path("bootstrap.php");


$router  = new \Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

try {
  $router->route($uri, $method);
} catch (ValidationExeption $exception) {
  Session::flash('errros', $exception->errors);
  Session::flash('old', $exception->old);
  return redirect($router->previousUrl());
}


Session::unflash();
