<?php


namespace SimpleForms\Base;


use SimpleForms\PluginBase;


/**
 * Class Enqueue
 * @package SimpleForms\Base
 */
class Enqueue extends PluginBase {

  public function register() {
    add_action('admin_enqueue_scripts', [$this, 'enqueue']);
  }

  function enqueue() {
    wp_enqueue_style('simple_forms_style', $this->getPluginUrl() . 'assets/style.css', ['jquery']);
    wp_enqueue_script('simple_forms_script', $this->getPluginUrl() . 'assets/script.js');
  }

}
