<?php


namespace SimpleForms\Callback\Partial\FormField;


use SimpleForms\Callback\Partial\PartialCallbackBase;
use SimpleForms\Enum\FormFieldType;


/**
 * Class FieldCallbackBase
 * @package SimpleForms\Callback\Partial\Form\Field
 */
abstract class FormFieldCallbackBase extends PartialCallbackBase {

  /**
   * Location of all form field callback templates
   */
  const FORM_FIELD_TEMPLATES_DIRECTORY = self::PARTIAL_TEMPLATES_DIRECTORY . '/form_field';

  const SINGLE_ANSWER_QUESTION_JS_CLASS = 'js-form-element';

  const MULTIPLE_ANSWER_QUESTION_JS_CLASS = 'js-form-group';

  /**
   * @var array
   */
  private $templateVariables = [];

  /**
   * FieldCallbackBase constructor.
   * @param array $variables
   */
  public function __construct(array $variables) {
    parent::__construct();
    $this->templateVariables = $this->filterTemplateVariables($variables);
  }

  /**
   * @inheritDoc
   */
  public function getTemplateVariables() {
    return $this->templateVariables;
  }

  /**
   * Removes variables that are not allowed and returns
   * filtered variables
   *
   * @param $variables
   * @return array
   */
  private function filterTemplateVariables(array $variables) {
    if (empty($variables)) {
      return [];
    }
    $allowed_variables = $this->getAllowedTemplateVariables();
    foreach ($variables as $key => $variable) {
      if (!in_array($key, $allowed_variables)) {
        unset($variables[$key]);
      }
    }

    $this->applyDefaultHtmlClasses($variables);

    return $variables;
  }

  /**
   * @param array $variables
   * @return void
   */
  private function applyDefaultHtmlClasses(array &$variables) {
    $is_multiple_answer_question = TRUE;
    $base_html_class = NULL;
    switch ($variables['type']) {
      case FormFieldType::TEXT_INPUT:
        $base_html_class = 'text-input';
        $is_multiple_answer_question = FALSE;
        break;
      case FormFieldType::SELECT_GROUP:
        $base_html_class = 'select';
        break;
      case FormFieldType::RADIO_GROUP:
        $base_html_class = 'radio';
        break;
      case FormFieldType::CHECKBOX_GROUP:
        $base_html_class = 'checkbox';
        break;
    }
    if ($base_html_class) {
      $this->generateDefaultHtmlClasses($variables, $base_html_class, $is_multiple_answer_question);
    }
  }

  /**
   * Generates html classes for field element and its child
   * elements (For example: <label>, <option>, <input> etc.)
   *
   * @param array $variables
   * @param string $base_class_name
   * @param bool $is_multiple_answer_question
   */
  private function generateDefaultHtmlClasses(array &$variables, string $base_class_name, bool $is_multiple_answer_question) {

    // Redefine base class name
    if ($is_multiple_answer_question) {
      $base_class_name = self::HTML_CLASS_PREFIX . $base_class_name . '-group';
    } else {
      $base_class_name = self::HTML_CLASS_PREFIX . $base_class_name;
    }

    // Add default field html classes
    $wrapper_class = $base_class_name . '-wrap';
    $field_classes = $variables['classes'] ?? [];

    if ($is_multiple_answer_question) {
      $field_classes = array_merge($field_classes, [
        $wrapper_class,
        self::MULTIPLE_ANSWER_QUESTION_JS_CLASS
      ]);
    } else {
      $field_classes = array_merge($field_classes, [
        $wrapper_class,
        self::SINGLE_ANSWER_QUESTION_JS_CLASS
      ]);
    }
    $variables['classes'] = implode(' ', $field_classes);

    // add 'value' and 'classes' properties to field's label
    if ($label_value = $variables['label']) {
      $label_value = $variables['label'];
      $label_html_classes = $base_class_name . '-label';
      $variables['label'] = [
        'value' => $label_value,
        'classes' => $label_html_classes
      ];
    }

    // Add html classes to field's options, or input (in case of a single answer question)
    if ($is_multiple_answer_question) {
      $field_options = $variables['options'] ?? [];
      $option_class_suffix = '-option';
      foreach ($field_options as $key => $option) {
        $option_html_classes = [
          $base_class_name . $option_class_suffix,
          self::MULTIPLE_ANSWER_QUESTION_JS_CLASS . $option_class_suffix
        ];
        $variables['options'][$key]['classes'] = implode(' ', $option_html_classes);
      }
    } else {
      $input_class_suffix = '-value';
      $input_classes = [
        $base_class_name . $input_class_suffix,
        self::SINGLE_ANSWER_QUESTION_JS_CLASS . $input_class_suffix
      ];
      $variables['input_classes'] = implode(' ', $input_classes);
    }
  }

  /**
   * Returns variable keys that can be used to render
   * variables in callback's template
   *
   * @return array
   */
  protected function getAllowedTemplateVariables() {
    return [
      'id',
      'classes',
      'type',
      'value',
      'label',
      'options'
    ];
  }

}
