<?php


namespace SimpleForms;


use SimpleForms\Base\Enqueue;
use SimpleForms\Base\SettingsLink;
use SimpleForms\Controller\CalculatorFormController;
use SimpleForms\Page\Admin;


/**
 * Class Init
 * @package SimpleForms
 */
final class Init {

  public static function get_services() {
    return [
      Enqueue::class,
      CalculatorFormController::class
    ];
  }

  public static function register_services() {
    foreach (self::get_services() as $service_class) {
      $service = new $service_class();
      if (method_exists($service, 'register')) {
        $service->register();
      }
    }
  }

}
