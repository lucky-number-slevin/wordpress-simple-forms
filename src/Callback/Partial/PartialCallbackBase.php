<?php


namespace SimpleForms\Callback\Partial;


use SimpleForms\TemplateManagerBase;


/**
 * Class PartialCallbackBase
 * @package SimpleForms\Callback
 */
abstract class PartialCallbackBase extends TemplateManagerBase implements PartialCallbackInterface {

  /**
   * Location of all partial callback templates
   */
  const PARTIAL_TEMPLATES_DIRECTORY = 'partial';

  /**
   * @inheritDoc
   */
  public function renderTemplate() {
    parent::render($this->getTemplatePath(), $this->getTemplateVariables());
  }

}
