<?php


namespace SimpleForms\Callback\Partial\FormField;


/**
 * Class ButtonCallback
 * @package SimpleForms\Callback\Partial\Form\Field
 */
class ButtonCallback extends FormFieldCallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return static::FORM_FIELD_TEMPLATES_DIRECTORY . '/button.html.twig';
  }

}
