<?php


namespace SimpleForms\Callback\Partial;


use SimpleForms\TemplateManagerBase;


/**
 * Class PartialCallbackBase
 * @package SimpleForms\Callback
 */
abstract class PartialCallbackBase extends TemplateManagerBase implements PartialCallbackInterface {

  const PARTIAL_TEMPLATE_SUBDIRECTORY = 'partial';

  /**
   * @inheritDoc
   */
  public function renderTemplate() {
    parent::render($this->getTemplatePath(), $this->getTemplateVariables());
  }

}
