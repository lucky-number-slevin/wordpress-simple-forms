<?php

/**
 * @package SimpleForms
 */

namespace SimpleForms\Api;


class SettingsApi {

  /**
   * @var array
   */
  private $adminPages = [];
  /**
   * @var array
   */
  private $adminSubpages = [];

  public function register() {
    if (!empty($this->adminPages)) {
      add_action('admin_menu', [$this, 'addAdminMenu']);
    }
  }

  public function addPages(array $pages) {
    $this->adminPages = $pages;
    return $this; // for method chaining
  }

  public function addSubpages(array $subpages) {
    $this->adminSubpages = array_merge($this->adminSubpages, $subpages);
    return $this; // for method chaining
  }

  public function withSubPage(string $title = NULL) {
    if (empty($this->adminPages)) {
      return $this; // for method chaining
    }

    $admin_page = reset($this->adminPages);
    $subpages = [
      'parent_slug' => $admin_page['menu_slug'],
      'page_title' => $admin_page['page_title'],
      'menu_title' => $title ?? $admin_page['menu_title'],
      'capability' => $admin_page['capability'],
      'menu_slug' => $admin_page['menu_slug'],
      'callback' => function () {
        echo '<h1>Simple Forms Plugin Callback Function</h1>';
      }
    ];

    $this->adminSubpages = [$subpages];

    return $this;
  }

  public function addAdminMenu() {
    foreach ($this->adminPages as $page) {
      add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
    }

    foreach ($this->adminSubpages as $page) {
      add_submenu_page($page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
    }
  }

}
