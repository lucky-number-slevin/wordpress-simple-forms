<?php
/**
 * @package SimpleForms
 */

namespace SimpleForms\Base;

class Deactivate {

  public static function deactivate() {
    flush_rewrite_rules();
  }

}
