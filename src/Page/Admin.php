<?php


namespace SimpleForms\Page;


use SimpleForms\PluginBase;
use SimpleForms\Callback\Admin\AddFormTemplate;
use SimpleForms\Callback\Admin\DashboardTemplate;
use SimpleForms\Callback\Admin\SubmissionsTemplate;


class Admin extends PluginBase {

  /**
   * @var array
   */
  private $primaryPage;
  /**
   * @var array
   */
  private $secondaryPages = [];

  function register() {
    $this->setPrimaryPage();
    $this->setPrimarySubPage('Dashboard');
    $this->setSecondaryPages();
    if (!empty($this->primaryPage)) {
      add_action('admin_menu', [$this, 'registerPages']);
    }
  }

  public function registerPages() {
    add_menu_page(
      $this->primaryPage['page_title'],
      $this->primaryPage['menu_title'],
      $this->primaryPage['capability'],
      $this->primaryPage['menu_slug'],
      $this->primaryPage['callback'],
      $this->primaryPage['icon_url'],
      $this->primaryPage['position']
    );

    foreach ($this->secondaryPages as $page) {
      add_submenu_page(
        $page['parent_slug'],
        $page['page_title'],
        $page['menu_title'],
        $page['capability'],
        $page['menu_slug'],
        $page['callback']
      );
    }
  }

  public function setPrimaryPage() {
    $this->primaryPage = [
      'page_title' => 'Simple Forms',
      'menu_title' => 'Simple Forms',
      'capability' => 'manage_options',
      'menu_slug' => 'simple_forms',
      'callback' => [new DashboardTemplate(), 'renderTemplate'],
      'icon_url' => 'dashicons-analytics',
      'position' => NULL
    ];
  }

  public function setPrimarySubPage(string $title = NULL) {
    if (empty($this->primaryPage)) {
      return;
    }

    $primary_sub_age = [
      'parent_slug' => $this->primaryPage['menu_slug'],
      'page_title' => $this->primaryPage['page_title'],
      'menu_title' => $title ?? $this->primaryPage['menu_title'],
      'capability' => $this->primaryPage['capability'],
      'menu_slug' => $this->primaryPage['menu_slug'],
      'callback' => $this->primaryPage['callback']
    ];

    $this->secondaryPages = array_merge($this->secondaryPages, [$primary_sub_age]);
  }

  public function setSecondaryPages() {
    if ($this->primaryPage['menu_slug']) {
      $secondary_pages = [
        [
          'parent_slug' => $this->primaryPage['menu_slug'],
          'page_title' => 'Simple Forms - Add Form',
          'menu_title' => 'Add Form',
          'capability' => 'manage_options',
          'menu_slug' => 'sp_add_form',
          'callback' => [new AddFormTemplate(), 'renderTemplate'],
        ],
        [
          'parent_slug' => $this->primaryPage['menu_slug'],
          'page_title' => 'Simple Forms - Submissions',
          'menu_title' => 'Submissions',
          'capability' => 'manage_options',
          'menu_slug' => 'sp_dashboard',
          'callback' => [new SubmissionsTemplate(), 'renderTemplate']
        ],
      ];
      $this->secondaryPages = array_merge($this->secondaryPages, $secondary_pages);
    }
  }

}
