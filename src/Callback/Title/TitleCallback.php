<?php


namespace SimpleForms\Callback\Title;


use SimpleForms\Callback\CallbackBase;


/**
 * Class TitleCallback
 * @package SimpleForms\Callback\Title
 */
class TitleCallback extends CallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return 'title.html.twig';
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
      'title'
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
