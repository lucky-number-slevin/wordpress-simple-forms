<?php


namespace SimpleForms;


class PluginBase {

  /**
   * @var string
   */
  public $pluginPath;
  /**
   * @var string
   */
  public $pluginUrl;
  /**
   * @var string
   */
  public $pluginName;

  public function __construct() {
    $this->pluginPath = plugin_dir_path(dirname(__FILE__ ));
    $this->pluginUrl = plugin_dir_path(dirname(__FILE__));
    $this->pluginName = plugin_basename(dirname(__FILE__, 2) . '/simple-forms.php');
  }

}
