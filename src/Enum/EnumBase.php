<?php


namespace SimpleForms\Enum;


use ReflectionClass;


abstract class EnumBase {

  final public static function getConstants() {
    return (new ReflectionClass(static::class))->getConstants();
  }

  final public static function isValid($value) {
    return in_array($value, static::getConstants());
  }

}
