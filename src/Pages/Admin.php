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
  /**
   * @var array
   */
  private $subpages;

  public function __construct() {
    parent::__construct();
    $this->settings = new SettingsApi();

    $this->pages = [
      'page_title' => 'Simple Forms',
      'menu_title' => 'Simple Forms',
      'capability' => 'manage_options',
      'menu_slug' => 'simple_forms',
      'callback' => function () {
        echo '<h1>Simple Forms</h1>';
      },
      'icon_url' => 'dashicons-analytics',
      'position' => NULL
    ];

    $this->subpages = [
      [
        'parent_slug' => $this->pages['menu_slug'],
        'page_title' => 'Simple Forms - Add Form',
        'menu_title' => 'Add Form',
        'capability' => 'manage_options',
        'menu_slug' => 'sp_add_form',
        'callback' => function () {
          echo '<h1>Simple Forms - Add Form</h1>';
        }
      ],
      [
        'parent_slug' => $this->pages['menu_slug'],
        'page_title' => 'Simple Forms - Submissions',
        'menu_title' => 'Dashboard',
        'capability' => 'manage_options',
        'menu_slug' => 'sp_dashboard',
        'callback' => function () {
          echo '<h1>Simple Forms - Dashboard</h1>';
        }
      ],
    ];
  }

  function register() {
    $this->settings->addPages([$this->pages])->withSubPage('Dashboard')->addSubpages($this->subpages)->register();
  }

}
