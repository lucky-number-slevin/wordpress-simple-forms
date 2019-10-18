<?php


namespace SimpleForms\Callback\Page\Admin;


use SimpleForms\Callback\Page\PageCallbackBase;
use SimpleForms\Callback\Partial\Form\CreateCalculatorFormCallback;


/**
 * Class AddFormPageCallback
 * @package SimpleForms\Callback\Page\Admin
 */
class AddFormPageCallback extends PageCallbackBase {

  const PAGE_TITLE = 'Add New Form';

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
    return [
      CreateCalculatorFormCallback::class
    ];
  }

}
