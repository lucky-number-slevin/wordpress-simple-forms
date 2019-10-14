<?php


namespace SimpleForms\Callback\Partial\Form;


use SimpleForms\Callback\Partial\PartialCallbackInterface;

/**
 * Provides a method for processing template variables
 *
 * Interface FormCallbackInterface
 * @package SimpleForms\Callback
 */
interface FormCallbackInterface extends PartialCallbackInterface {

  /**
   * Returns processed template variables
   *
   * @return array
   */
  public function processTemplateVariables();

}
