<?php


namespace SimpleForms\Callback\Partial\Form\Field;

/**
 * Class RadioGroupCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class RadioGroupCallback extends FieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return self::PARTIAL_TEMPLATE_SUBDIRECTORY . '/radio-group.html.twig';
  }

  /**
   * @inheritDoc
   */
  public function getAllowedTemplateVariables() {
    return [
      'label',
      'options'
    ];
  }
}
