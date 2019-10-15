<?php


namespace SimpleForms\Controller;


/**
 * Interface ControllerBaseInterface
 * @package SimpleForms\Controller
 */
interface ControllerInterface {

  /**
   * @return void
   */
  public function register();

  /**
   * @return array
   */
  public function getRoutes();

}
