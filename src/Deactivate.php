<?php
/**
 * @package SimpleForms
 */

namespace SimpleForms;

class Deactivate {

  public static function deactivate() {
    flush_rewrite_rules();
  }

}
