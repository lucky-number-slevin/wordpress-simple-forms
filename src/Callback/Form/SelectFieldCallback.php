<?php


namespace SimpleForms\Callback\Form;


use SimpleForms\Callback\CallbackBase;


/**
 * Class SelectFieldCallback
 * @package SimpleForms\Callback\Form
 */
class SelectFieldCallback extends CallbackBase {

  /**
   * Return template path relative to templates base
   * directory
   *
   * @return string
   */
  public function getTemplatePath() {
    return 'select-field.html.twig';
  }

  /**
   * Returns an array of all allowed parameters that will be
   * used as keys for variables which will be rendered in the
   * callback template
   *
   * @return mixed
   */
  public function getCallbackParameterKeys() {
    return [
      'label',
      'options'
    ];
  }

  /**
   * Returns all the callbacks classes with their parameters
   * in order in which you want them to be rendered
   *
   * @return array
   */
  public function getChildCallbacks() {
    return [];
  }

}
