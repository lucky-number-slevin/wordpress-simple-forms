<?php


namespace SimpleForms\Callback\Page\Admin;


use SimpleForms\Callback\Page\PageCallbackBase;

/**
 * Class DashboardPageCallback
 * @package SimpleForms\Callback\Page\Admin
 */
class DashboardPageCallback extends PageCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return self::DEFAULT_PAGE_TEMPLATE_PATH;
  }


  /**
   * @inheritDoc
   */
  public function getTemplateVariables() {
    return [
      'title' => 'Dashboard'
    ];
  }

  /**
   * @inheritDoc
   */
  public function getChildCallbacks() {
    return [];
  }
}
