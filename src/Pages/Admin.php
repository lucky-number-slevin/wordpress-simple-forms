<?php


namespace SimpleForms\Pages;


use SimpleForms\Api\Callbacks\AdminCallbacks;
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
  /**
   * @var array
   */
  private $subpages;
  /**
   * @var AdminCallbacks
   */
  private $callbacks;

  public function __construct() {
    parent::__construct();
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();
  }

  function register() {
    $this->setPages();
    $this->setSubpages();
    $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubpages($this->subpages)->register();
  }

  public function setPages() {
    $this->pages = [
      [
        'page_title' => 'Simple Forms',
        'menu_title' => 'Simple Forms',
        'capability' => 'manage_options',
        'menu_slug' => 'simple_forms',
        'callback' => [$this->callbacks, 'getDashboardTemplate'],
        'icon_url' => 'dashicons-analytics',
        'position' => NULL
      ]
    ];
  }

  public function setSubpages() {
    $this->subpages = [
      [
        'parent_slug' => reset($this->pages)['menu_slug'],
        'page_title' => 'Simple Forms - Add Form',
        'menu_title' => 'Add Form',
        'capability' => 'manage_options',
        'menu_slug' => 'sp_add_form',
        'callback' => [$this->callbacks, 'getAddFormTemplate'],
      ],
      [
        'parent_slug' => reset($this->pages)['menu_slug'],
        'page_title' => 'Simple Forms - Submissions',
        'menu_title' => 'Submissions',
        'capability' => 'manage_options',
        'menu_slug' => 'sp_dashboard',
        'callback' => [$this->callbacks, 'getSubmissionsTemplate']
      ],
    ];
  }

}
