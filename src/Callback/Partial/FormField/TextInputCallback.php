<?php


namespace SimpleForms\Callback\Partial\FormField;


/**
 * Class TextInputFieldCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class TextInputCallback extends FormFieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return static::FORM_FIELD_TEMPLATES_DIRECTORY . '/text-input.html.twig';
  }

}
