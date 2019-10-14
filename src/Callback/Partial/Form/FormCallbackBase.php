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
  const FORM_TEMPLATES_DIRECTORY =  self::PARTIAL_TEMPLATES_DIRECTORY . '/form';

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
        switch ($field_type) {
          case FormFieldType::TEXT_INPUT:
            $text_input_callback = new TextInputCallback($field);
            $processed_form_fields[$key] = new PartialCallbackRenderer($text_input_callback);
            break;
          case FormFieldType::SELECT_GROUP:
            $select_group_callback = new SelectGroupCallback($field);
            $processed_form_fields[$key] = new PartialCallbackRenderer($select_group_callback);
            break;
          case FormFieldType::RADIO_GROUP:
            $radio_group_callback = new RadioGroupCallback($field);
            $processed_form_fields[$key] = new PartialCallbackRenderer($radio_group_callback);
            break;
          case FormFieldType::CHECKBOX_GROUP:
            $checkbox_group_callback = new CheckboxGroupCallback($field);
            $processed_form_fields[$key] = new PartialCallbackRenderer($checkbox_group_callback);
            break;
          case FormFieldType::SUBMIT:
            $button_callback = new ButtonCallback($field);
            $processed_form_fields[$key] = new PartialCallbackRenderer($button_callback);
            break;
        }
      }
      // replace unprocessed form fields with processed form fields
      $template_variables[self::FORM_FIELDS_KEY] = $processed_form_fields;
      return $template_variables;
    }
    return [];
  }

}
