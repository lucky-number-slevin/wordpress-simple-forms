<?php


namespace SimpleForms\Callback\Form;


use SimpleForms\Callback\CallbackBase;


/**
 * Class Form
 * @package SimpleForms\Callback
 */
class FormCallback extends CallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return 'form.html.twig';
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
      'action',
      'submit'
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
