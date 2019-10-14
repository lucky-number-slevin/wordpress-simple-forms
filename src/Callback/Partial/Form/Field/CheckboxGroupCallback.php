<?php


namespace SimpleForms\Callback\Partial\Form\Field;

/**
 * Class CheckboxGroupCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class CheckboxGroupCallback extends FieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return self::PARTIAL_TEMPLATE_SUBDIRECTORY . '/checkbox-group.html.twig';
  }

  /**
   * @return array
   */
  public function getAllowedTemplateVariables() {
    return [
      'label',
      'options'
    ];
  }
}
