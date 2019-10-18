<?php


namespace SimpleForms\Page;


use SimpleForms\PluginBase;
use SimpleForms\Callback\Page\Admin\DashboardPageCallback;
use SimpleForms\Callback\Page\Admin\AddFormPageCallback;
use SimpleForms\Callback\Page\Admin\SubmissionsPageCallback;


/**
 * Class Admin
 * @package SimpleForms\Page
 */
class Admin extends PluginBase {

  const MENU_SLUG_PREFIX = 'sf_';

  const PAGE_TITLE_PREFIX = 'SF - ';

  const CALLBACK_CLASS_KEY = 'callback_class';

  const CALLBACK_FUNCTION_KEY = 'callback_function';

  const DEFAULT_CALLBACK_FUNCTION = 'renderTemplate';

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
    $this->setPrimarySubPage();
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
      if ($page['menu_slug'] !== $this->primaryPage['menu_slug']) {
        $page['menu_slug'] = self::MENU_SLUG_PREFIX . $page['menu_slug'];
      }
      add_submenu_page(
        $page['parent_slug'],
        self::PAGE_TITLE_PREFIX . $page['page_title'],
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
      'callback' => $this->generatePageCallback(DashboardPageCallback::class),
      'icon_url' => 'dashicons-analytics',
      'position' => NULL
    ];
  }

  public function setPrimarySubPage() {
    if (empty($this->primaryPage)) {
      return;
    }

    $primary_sub_age = [
      'parent_slug' => $this->primaryPage['menu_slug'],
      'page_title' => $this->primaryPage['page_title'],
      'menu_title' => DashboardPageCallback::PAGE_TITLE,
      'capability' => $this->primaryPage['capability'],
      'menu_slug' => $this->primaryPage['menu_slug'],
      'callback' => $this->primaryPage['callback'],
    ];

    $this->secondaryPages = array_merge($this->secondaryPages, [$primary_sub_age]);
  }

  public function setSecondaryPages() {
    if ($this->primaryPage['menu_slug']) {
      $secondary_pages = [
        [
          'parent_slug' => $this->primaryPage['menu_slug'],
          'page_title' => AddFormPageCallback::PAGE_TITLE,
          'menu_title' => AddFormPageCallback::PAGE_TITLE,
          'capability' => 'manage_options',
          'menu_slug' => 'add_new_form',
          'callback' => $this->generatePageCallback(AddFormPageCallback::class)
        ],
        [
          'parent_slug' => $this->primaryPage['menu_slug'],
          'page_title' => SubmissionsPageCallback::PAGE_TITLE,
          'menu_title' => SubmissionsPageCallback::PAGE_TITLE,
          'capability' => 'manage_options',
          'menu_slug' => 'dashboard',
          'callback' => $this->generatePageCallback(SubmissionsPageCallback::class),
        ],
      ];
      $this->secondaryPages = array_merge($this->secondaryPages, $secondary_pages);
    }
  }

  private function generatePageCallback(string $class, string $function = self::DEFAULT_CALLBACK_FUNCTION) {
    return [new $class(), $function];
  }

}
