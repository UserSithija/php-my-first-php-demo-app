<?php

namespace Core;

use Exception;

class Container
{
  protected $bindings = [];
  function bind($key, $resolver)
  {

    $this->bindings[$key] = $resolver;
  }
  function resolve($key)
  {

    if (!array_key_exists($key, $this->bindings)) {
      throw new Exception('No matching binding found for your key' . $key);
    }

    $resolver = $this->bindings[$key];
    return call_user_func($resolver);
  }
}
