<?php

namespace Http\Forms;

use Core\ValidationExeption;
use Core\Validator;
use Exception;

class LoginForm
{
  protected $errors = [];

  public function __construct(public array $attributes)
  {

    if (!Validator::email($attributes['email'])) {
      $errors['email'] = "please provide a valid email address";
    }
    if (!Validator::string($attributes['password'])) {
      $errors['password'] = 'please provide a valid password  ';
    }
  }


  static function validate($attributes)
  {
    $instance =  new static($attributes);

    return $instance->faild() ? $instance->throw() : $instance;
  }
  function throw()
  {
    ValidationExeption::throw($this->errors(), $this->attributes);
  }

  function faild()
  {
    return count($this->errors);
  }

  function errors()
  {
    return $this->errors;
  }
  function error($field, $message)
  {
    $this->errors[$field] = $message;
    return $this;
  }
}
