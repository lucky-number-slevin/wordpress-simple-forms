<?php


namespace SimpleForms\Controller;


/**
 * Class CreateFormController
 * @package SimpleForms\Controller
 */
class CreateFormController extends ControllerBase {

  /**
   * @inheritDoc
   */
  public function getRoutes() {

    // Test route 1
    $routes['create-form'] = [
      'methods' => 'GET',
      'callback' => [$this, 'get_items']
    ];

    // Test route 2
    $routes['create-form-2'] = [
      'methods' => 'GET',
      'callback' => [$this, 'get_items2']
    ];

    return $routes;
  }

  // Test route callback 1
  public function get_items() {
    var_dump('GET 1');
  }

  // Test route callback 2
  public function get_items2() {
    var_dump('GET 2');
  }

}
