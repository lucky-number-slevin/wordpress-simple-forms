<?php


namespace SimpleForms\Callback\Page;

use SimpleForms\Callback\CallbackInterface;

/**
 * Provides a method for handling child callbacks
 *
 * Interface PageCallbackInterface
 * @package SimpleForms\Callback
 */
interface PageCallbackInterface extends CallbackInterface {

  /**
   * Returns all the callbacks classes with their parameters
   * in order in which you want them to be rendered.
   *
   * @return array
   */
  public function getChildCallbacks();

}
