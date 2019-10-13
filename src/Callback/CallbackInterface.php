<?php


namespace SimpleForms\Callback;


/**
 * Interface CallbackInterface
 * @package SimpleForms\Callback
 */
interface CallbackInterface {

  /**
   * Return template path relative to templates base
   * directory
   *
   * @return string
   */
  public function getTemplatePath();

  /**
   * Returns an array of all allowed parameters that will be
   * used as keys for variables which will be rendered in the
   * callback template
   *
   * @return mixed
   */
  public function getCallbackParameterKeys();

  /**
   * Returns all the callbacks classes with their parameters
   * in order in which you want them to be rendered.
   *
   * @return array
   */
  public function getChildCallbacks();

}
