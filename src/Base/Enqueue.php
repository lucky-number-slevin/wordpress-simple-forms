<?php


namespace SimpleForms\Base;


use SimpleForms\PluginBase;


/**
 * Class Enqueue
 * @package SimpleForms\Base
 */
class Enqueue extends PluginBase {

  const ASSETS_ROOT_DIRECTORY = 'assets';

  const SCRIPT_ROOT_DIRECTORY = self::ASSETS_ROOT_DIRECTORY . '/js';

  const STYLE_ROOT_DIRECTORY = self::ASSETS_ROOT_DIRECTORY . '/style';

  public function register() {
    add_action('admin_enqueue_scripts', [$this, 'enqueue']);
  }

  function enqueue() {
    $script_paths = $this->getScriptFiles();
    foreach ($script_paths as $name => $script_path) {
      wp_enqueue_script('sp_script_' . $name, $this->getPluginUrl() . self::SCRIPT_ROOT_DIRECTORY . '/' . $script_path, ['jquery']);
    }

    $style_paths = $this->getStyleFiles();
    foreach ($style_paths as $name => $style_path) {
      wp_enqueue_style('sp_style_' . $name, $this->getPluginUrl() . self::STYLE_ROOT_DIRECTORY . '/' . $style_path);
    }
  }

  /**
   * Returns an array of all script file name paths (relative to
   * scripts root directory folder) that will be registered
   *
   * @return array
   */
  function getScriptFiles() {
    return [
      'main' => 'main.js',
      'form_service' => 'services/FormService.js',
      'form_handler' => 'handlers/FormHandler.js',
      'form_helper' => 'helpers/FormHelper.js',
    ];
  }

  /**
   * Returns an array of all style file name paths (relative to
   * styles root directory folder) that will be registered
   *
   * @return array
   */
  function getStyleFiles() {
    return [
      'main' => 'main.css'
    ];
  }

}
