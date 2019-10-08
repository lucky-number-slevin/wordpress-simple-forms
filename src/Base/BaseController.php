<?php


namespace SimpleForms\Base;


class BaseController {

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
        $this->pluginPath = plugin_dir_path(dirname(__FILE__, 2));
        $this->pluginUrl = plugin_dir_path(dirname(__FILE__, 2));
        $this->pluginName = plugin_basename(dirname(__FILE__, 3) . '/simple-forms.php');
    }

}
