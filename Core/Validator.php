<?php

namespace Core;

class Validator
{
     public static function string($value, $min = 1, $max = INF)
     {
          $value = trim($value);

          return strlen($value) >= $min && strlen($value) <= $max;
     }
     public static function email($value)
     {
          return filter_var($value, FILTER_VALIDATE_EMAIL);
     }
     public static function contact($value, $length = 11)
     {
          $value = trim($value);
          return $value[0] === '0' && strlen($value) === $length;
     }
     public static function number($value)
     {
          return is_numeric($value);
     }
}