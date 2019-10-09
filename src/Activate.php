<?php
/**
 * @package SimpleForms
 */

namespace SimpleForms;

class Activate {

  public static function activate() {
    flush_rewrite_rules();
  }

}
