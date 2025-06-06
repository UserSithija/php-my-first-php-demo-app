<?php

namespace Core;

use Exception;

class ValidationExeption extends Exception
{
  public readonly array $errors;
  public readonly array $old;


  public static function throw($errors, $old)
  {
    $instance = new static;
    $instance->errors = $errors;
    $instance->old = $old;

    throw $instance;
  }
}
