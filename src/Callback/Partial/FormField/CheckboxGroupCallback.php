<?php


namespace SimpleForms\Callback\Partial\FormField;


/**
 * Class CheckboxGroupCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class CheckboxGroupCallback extends FormFieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return static::FORM_FIELD_TEMPLATES_DIRECTORY . '/checkbox-group.html.twig';
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
