<?php


namespace SimpleForms\Controller;


use WP_REST_Request;


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
    $routes['get'] = [
      'methods' => 'GET',
      'callback' => [$this, 'getMethod']
    ];

    // Test route 2
    $routes['create-calculator-form'] = [
      'methods' => 'POST',
      'callback' => [$this, 'createCalculatorForm']
    ];

    return $routes;
  }

  // Test route callback 1
  public function getMethod() {

    $element = new \stdClass();
    $element->id = 1;
    $element->value = 10;

    $data = [
      'message' => 'get method response data...',
      'elements' => [
        $element
      ]
    ];

    return $data;
  }

  // Test route callback 2
  public function createCalculatorForm(WP_REST_Request $request) {

    wp_send_json(json_decode($request->get_body()));

//    $body = json_decode($request->get_body());
//
//    $first = reset($body);
//
//    if($first instanceof \stdClass) {
//      var_dump("FIRST ELEMENT IN BODY IS OF stdClass. Converting into an array");
//      $first = json_decode(json_encode($first), true);
//    }
//
//    var_dump($first);
  }

}
