<?php


namespace SimpleForms\Callback\Partial\Form\Field;


/**
 * Class ButtonCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class ButtonCallback extends FieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return self::PARTIAL_TEMPLATE_SUBDIRECTORY . '/button.html.twig';
  }

  /**
   * @return array
   */
  public function getAllowedTemplateVariables() {
    return [
      'label',
      'type'
    ];
  }
}
