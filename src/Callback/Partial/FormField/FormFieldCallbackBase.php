<?php


namespace SimpleForms\Callback\Partial\FormField;


use SimpleForms\Callback\Partial\PartialCallbackBase;


/**
 * Class FieldCallbackBase
 * @package SimpleForms\Callback\Partial\Form\Field
 */
abstract class FormFieldCallbackBase extends PartialCallbackBase {

  /**
   * Location of all form field callback templates
   */
  const FORM_FIELD_TEMPLATES_DIRECTORY = self::PARTIAL_TEMPLATES_DIRECTORY . '/form_field';

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
   * Returns variable keys that can be used to render
   * variables in callback's template
   *
   * @return array
   */
  public abstract function getAllowedTemplateVariables();

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
    $allowed_variables =  array_merge($this->getAllowedTemplateVariables() ?? [], $this->getDefaultAllowedTemplateVariables());
    foreach ($variables as $key => $variable) {
      if (!in_array($key, $allowed_variables)) {
        unset($variables[$key]);
      }
    }
    return $variables;
  }

  /**
   * @return array
   */
  private function getDefaultAllowedTemplateVariables() {
    return [
      'classes'
    ];
  }

}
