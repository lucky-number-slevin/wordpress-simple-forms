<?php

namespace SimpleForms;

use SimpleForms\Base\Enqueue;
use SimpleForms\Base\SettingsLink;
use SimpleForms\Pages\Admin;

final class Init {

  public static function get_services() {
    // TODO: use classes as keys and add arrays of dependencies as values
    return [
      SettingsLink::class,
      Enqueue::class,
      Admin::class
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
