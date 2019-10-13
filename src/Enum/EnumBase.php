<?php


namespace SimpleForms\Enum;


use ReflectionClass;
use ReflectionException;


/**
 * Class EnumBase
 * @package SimpleForms\Enum
 */
abstract class EnumBase {

  /**
   * @return array
   * @throws ReflectionException
   */
  final public static function getConstants() {
    return (new ReflectionClass(static::class))->getConstants();
  }

  /**
   * @param $value
   * @return bool
   * @throws ReflectionException
   */
  final public static function isValid($value) {
    return in_array($value, static::getConstants());
  }

}
