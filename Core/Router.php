<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  protected  $routes = [];


  protected function set_routes($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' =>  $method,
      'middleware' => null
    ];
    return $this;
  }

  function get($uri, $controller)
  {
    return $this->set_routes('GET', $uri, $controller);
  }


  function post($uri, $controller)
  {
    return $this->set_routes('POST', $uri, $controller);
  }


  function patch($uri, $controller)
  {
    return $this->set_routes('PATCH', $uri, $controller);
  }


  function delete($uri, $controller)
  {
    return $this->set_routes("DELETE", $uri, $controller);
  }


  function put($uri, $controller)
  {
    return $this->set_routes('PUT', $uri, $controller);
  }


  function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
  }

  function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        //apply the middleware
        Middleware::resolve($route['middleware']);
        return require base_path('Http/controllers/' . $route['controller']);
      }
    }
    $this->abort();
  }

  function previousUrl()
  {
    return $_SERVER['HTTP_REFERER'];
  }

  protected function abort($code = 404)
  {
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
  }
}
