<?php


namespace SimpleForms\Callback;


/**
 * Provides a method that can be called inside a template
 * to render partial callback.
 *
 *
 * Interface PartialCallbackRendererInterface
 * @package SimpleForms\Callback
 */
interface PartialCallbackRendererInterface {

  /**
   * Renders a child callback inside a parent callback.
   *
   * @return void
   */
  public function content();

}
