<?php


namespace SimpleForms\Callback\Admin;


use SimpleForms\Callback\CallbackBase;
use SimpleForms\Callback\Title\TitleCallback;


/**
 * Class SubmissionsPageCallback
 * @package SimpleForms\Callback\Admin
 */
class SubmissionsPageCallback extends CallbackBase {

  /**
   * @inheritDoc
   */
  public function getTemplatePath() {
    return 'page.html.twig';
  }

  /**
   * Returns an array of all allowed parameters that will be
   * used as keys for variables which will be rendered in the
   * callback template
   *
   * @return mixed
   */
  public function getCallbackParameterKeys() {
    // TODO: Implement getCallbackParameterKeys() method.
  }

  /**
   * Returns all the callbacks classes with their parameters
   * in order in which you want them to be rendered
   *
   * @return array
   */
  public function getChildCallbacks() {
    return [
      TitleCallback::class => [
        'title' => 'Dashboard'
      ],
    ];
  }

}
