<?php


namespace SimpleForms\Callback\Partial\Form\Field;


use SimpleForms\Callback\Partial\PartialCallbackBase;

/**
 * Class FieldCallbackBase
 * @package SimpleForms\Callback\Partial\Form\Field
 */
abstract class FieldCallbackBase extends PartialCallbackBase {

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
    if(empty($variables)) {
      return [];
    }
    $allowed_variables = $this->getAllowedTemplateVariables() ?? [];
    foreach ($variables as $key => $variable) {
      if (!in_array($key, $allowed_variables)) {
        unset($variables[$key]);
      }
    }
    return $variables;
  }

}
