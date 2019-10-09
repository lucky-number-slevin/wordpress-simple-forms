<?php

/**
 * @package SimpleForms
 */

namespace SimpleForms\Api;


class SettingsApi {

  /**
   * @var array
   */
  private $adminPage = [];
  /**
   * @var array
   */
  private $adminSubpages = [];

  public function register() {
    if (!empty($this->adminPage)) {
      add_action('admin_menu', [$this, 'addAdminMenu']);
    }
  }

  public function addMainPage(array $pages) {
    $this->adminPage = $pages;
    return $this;
  }

  public function withSubpage(string $title = NULL) {
    if (empty($this->adminPage)) {
      return $this;
    }

    $subpages = [
      'parent_slug' => $this->adminPage['menu_slug'],
      'page_title' => $this->adminPage['page_title'],
      'menu_title' => $title ?? $this->adminPage['menu_title'],
      'capability' => $this->adminPage['capability'],
      'menu_slug' => $this->adminPage['menu_slug'],
      'callback' => $this->adminPage['callback']
    ];

    $this->adminSubpages = [$subpages];

    return $this;
  }

  public function addSubpages(array $subpages) {
    $this->adminSubpages = array_merge($this->adminSubpages, $subpages);
    return $this;
  }

  public function addAdminMenu() {
    add_menu_page(
      $this->adminPage['page_title'],
      $this->adminPage['menu_title'],
      $this->adminPage['capability'],
      $this->adminPage['menu_slug'],
      $this->adminPage['callback'],
      $this->adminPage['icon_url'],
      $this->adminPage['position']
    );

    foreach ($this->adminSubpages as $page) {
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

}
