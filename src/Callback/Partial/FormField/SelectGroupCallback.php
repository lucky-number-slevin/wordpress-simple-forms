<?php


namespace SimpleForms\Callback\Partial\FormField;


/**
 * Class SelectGroupCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class SelectGroupCallback extends FormFieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return static::FORM_FIELD_TEMPLATES_DIRECTORY . '/select-group.html.twig';
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
