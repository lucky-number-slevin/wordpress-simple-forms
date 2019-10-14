<?php


namespace SimpleForms\Callback;


use SimpleForms\Callback\Partial\PartialCallbackInterface;


/**
 * Wraps a partial callback to allow it to be rendered
 * inside a parent callback's template
 *
 * Class PartialCallbackRenderer
 * @package SimpleForms\Callback
 */
class PartialCallbackRenderer implements PartialCallbackRendererInterface {

  /**
   * @var CallbackInterface
   */
  private $callback;

  /**
   * PartialCallbackRenderer constructor.
   * @param PartialCallbackInterface $callback
   */
  public function __construct(PartialCallbackInterface $callback) {
    $this->callback = $callback;
  }

  /**
   * @return void
   */
  public function content() {
    $this->callback->renderTemplate();
  }

}
