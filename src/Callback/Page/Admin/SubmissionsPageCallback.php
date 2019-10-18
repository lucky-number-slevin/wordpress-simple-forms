<?php


namespace SimpleForms\Callback\Page\Admin;


use SimpleForms\Callback\Page\PageCallbackBase;


/**
 * Class SubmissionsPageCallback
 * @package SimpleForms\Callback\Page\Admin
 */
class SubmissionsPageCallback extends PageCallbackBase {

  const PAGE_TITLE = 'Submissions';

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
      'title' => self::PAGE_TITLE
    ];
  }

  /**
   * @inheritDoc
   */
  public function getChildCallbacks() {
    return [];
  }

}
