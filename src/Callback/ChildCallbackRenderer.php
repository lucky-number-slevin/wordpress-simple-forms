<?php


namespace SimpleForms\Callback;


/**
 * Class ChildCallback
 */
class ChildCallbackRenderer {

  /**
   * @var CallbackInterface
   */
  private $callback;

  /**
   * ChildCallbackRenderer constructor.
   * @param CallbackInterface $callback
   */
  public function __construct(CallbackInterface $callback) {
    $this->callback = $callback;
  }

  /**
   * @return void
   */
  public function content() {
    $this->callback->renderTemplate();
  }

}
