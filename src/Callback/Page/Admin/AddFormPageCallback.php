<?php


namespace SimpleForms\Callback\Page\Admin;


use SimpleForms\Callback\Page\PageCallbackBase;
use SimpleForms\Callback\Partial\Form\CreateFormCallback;


/**
 * Class AddFormPageCallback
 * @package SimpleForms\Callback\Page\Admin
 */
class AddFormPageCallback extends PageCallbackBase {

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
      'title' => 'Add Form'
    ];
  }

  /**
   * @inheritDoc
   */
  public function getChildCallbacks() {
    return [
      CreateFormCallback::class
    ];
  }

}
