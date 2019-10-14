<?php


namespace SimpleForms\Callback\Partial\Form\Field;

/**
 * Class SelectGroupCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class SelectGroupCallback extends FieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return self::PARTIAL_TEMPLATE_SUBDIRECTORY . '/select-group.html.twig';
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
