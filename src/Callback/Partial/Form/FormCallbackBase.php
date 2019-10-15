<?php


namespace SimpleForms\Callback\Partial\Form;


use SimpleForms\Callback\Partial\FormField\ButtonCallback;
use SimpleForms\Callback\Partial\FormField\CheckboxGroupCallback;
use SimpleForms\Callback\Partial\FormField\RadioGroupCallback;
use SimpleForms\Callback\Partial\FormField\SelectGroupCallback;
use SimpleForms\Callback\Partial\FormField\TextInputCallback;
use SimpleForms\Callback\Partial\PartialCallbackBase;
use SimpleForms\Callback\PartialCallbackRenderer;
use SimpleForms\Enum\FormFieldType;


/**
 * Class FormCallbackBase
 * @package SimpleForms\Callback
 */
abstract class FormCallbackBase extends PartialCallbackBase {

  /**
   * Location of all form callback templates
   */
  const FORM_TEMPLATES_DIRECTORY = self::PARTIAL_TEMPLATES_DIRECTORY . '/form';

  const FORM_FIELDS_KEY = 'fields';

  /**
   * @inheritDoc
   * @throws \ReflectionException
   */
  public function renderTemplate() {
    $template_variables = $this->processTemplateVariables();
    parent::render($this->getTemplatePath(), $template_variables);
  }

  /**
   * Wrap form fields with their corresponding callback classes,
   * and add some default html classes to them
   *
   * @inheritDoc
   * @throws \ReflectionException
   * @throws \Exception
   */
  public function processTemplateVariables() {
    $template_variables = $this->getTemplateVariables();
    $form_fields = $template_variables[self::FORM_FIELDS_KEY];
    $processed_form_fields = [];
    if ($form_fields) {
      foreach ($form_fields as $key => $field) {
        $field_type = $field['type'];
        if (!FormFieldType::isValid($field_type)) {
          throw new \Exception("Invalid field type '$field_type'");
        }
        $field_class = NULL;
        switch ($field_type) {
          case FormFieldType::TEXT_INPUT:
            $field_class = TextInputCallback::class;
            break;
          case FormFieldType::SELECT_GROUP:
            $field_class = SelectGroupCallback::class;
            break;
          case FormFieldType::RADIO_GROUP:
            $field_class = RadioGroupCallback::class;
            break;
          case FormFieldType::CHECKBOX_GROUP:
            $field_class = CheckboxGroupCallback::class;
            break;
          case FormFieldType::SUBMIT:
          case FormFieldType::BUTTON:
            $field_class = ButtonCallback::class;
            break;
        }
        if ($field_class) {
          $processed_form_fields[$key] = new PartialCallbackRenderer(new $field_class($field));
        }
      }
      $template_variables[self::FORM_FIELDS_KEY] = $processed_form_fields;
      return $template_variables;
    }
    return [];
  }

}
