<?php

namespace Core;

class Validator
{

  public static function string($value, $min = 1, $maximum = INF)
  {
    $value = trim($value);
    return strlen($value) >= $min && strlen($value) <= $maximum;
  }

  public static function email($value,)
  {

    //Validator::email()
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  public static function greaterThan(int $value, int $greaterThan)
  {

    return $value > $greaterThan;
  }
}
