<?php


namespace SimpleForms\Pages;


use SimpleForms\Api\SettingsApi;
use SimpleForms\Base\BaseController;

class Admin extends BaseController {

  /**
   * @var SettingsApi
   */
  private $settings;
  /**
   * @var array
   */
  private $pages;

  public function __construct() {
    parent::__construct();
    $this->settings = new SettingsApi();
    $this->pages = [
      'page_title' => 'Simple Forms',
      'menu_title' => 'Simple Forms',
      'capability' => 'manage_options',
      'menu_slug' => 'simple_forms',
      'callback' => function () {
        echo '<h1>Simple Forms Plugin Callback Function</h1>';
      },
      'icon_url' => 'dashicons-analytics',
      'position' => NULL
    ];
  }

  function register() {
    $this->settings->addPages([$this->pages])->register();
  }

}
