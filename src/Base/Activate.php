<?php
/**
 * @package SimpleForms
 */

namespace SimpleForms\Base;

class Activate {

  public static function activate() {
    flush_rewrite_rules();
  }

}
