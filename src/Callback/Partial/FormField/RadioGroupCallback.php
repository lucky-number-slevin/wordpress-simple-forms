<?php


namespace SimpleForms\Callback\Partial\FormField;


/**
 * Class RadioGroupCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class RadioGroupCallback extends FormFieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return static::FORM_FIELD_TEMPLATES_DIRECTORY . '/radio-group.html.twig';
  }

}
