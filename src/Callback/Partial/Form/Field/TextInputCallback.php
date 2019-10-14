<?php


namespace SimpleForms\Callback\Partial\Form\Field;


/**
 * Class TextInputFieldCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class TextInputCallback extends FieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return self::PARTIAL_TEMPLATE_SUBDIRECTORY . '/text-input.html.twig';
  }

  /**
   * @inheritDoc
   */
  public function getAllowedTemplateVariables() {
    return [
      'name',
      'label',
    ];
  }

}
