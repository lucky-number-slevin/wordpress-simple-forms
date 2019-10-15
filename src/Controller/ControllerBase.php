<?php


namespace SimpleForms\Controller;


/**
 * Class ControllerBase
 * @package SimpleForms\Controller
 */
abstract class ControllerBase implements ControllerInterface {

  const NAMESPACE = 'simple-forms/v1';

  /**
   * @inheritDoc
   */
  public function register() {
    add_action('rest_api_init', function () {
      $routes = $this->getRoutes() ?? [];
      foreach ($routes as $name => $route) {
        register_rest_route(self::NAMESPACE, '/' . $name, [
          'methods' => $route['methods'],
          'callback' => $route['callback'],
        ]);
      }
    });
  }

}
