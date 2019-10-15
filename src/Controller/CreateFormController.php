<?php


namespace SimpleForms\Controller;


use WP_REST_Controller;


/**
 * Class CreateFormController
 * @package SimpleForms\Controller
 */
class CreateFormController {


  public function register() {
    add_action('rest_api_init', function () {
      $this->register_routes();
    });
  }


  public function register_routes() {
    $namespace = 'simple-forms/v1';
    $path = 'create-form';

    register_rest_route($namespace, '/' . $path, [
      'methods' => 'GET',
      'callback' => [$this, 'get_items'],
    ]);
  }

  public function get_items() {
    var_dump('dfasdfadf');
  }

}
