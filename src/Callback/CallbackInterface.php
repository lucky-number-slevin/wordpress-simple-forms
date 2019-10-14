<?php


namespace SimpleForms\Callback;


/**
 * Interface CallbackInterface
 * @package SimpleForms\Callback
 */
interface CallbackInterface {

  /**
   * Return callback's template path relative to templates
   * base directory
   *
   * @return string
   */
  public function getTemplatePath();

  /**
   * Returns variables that will serve as context for the
   * callback's template
   *
   * @return array
   */
  public function getTemplateVariables();

  /**
   * Renders the callback's template
   *
   * @return void
   */
  public function renderTemplate();

}
