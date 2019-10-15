<?php


namespace SimpleForms;


use SimpleForms\Base\Enqueue;
use SimpleForms\Base\SettingsLink;
use SimpleForms\Controller\CreateFormController;
use SimpleForms\Page\Admin;


/**
 * Class Init
 * @package SimpleForms
 */
final class Init {

  public static function get_services() {
    return [
      SettingsLink::class,
      Enqueue::class,
      Admin::class,
      Database::class,
      CreateFormController::class
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
