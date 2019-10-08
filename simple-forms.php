<?php

/**
 * @package JazasWatu
 */

/*
Plugin Name: Simple Forms
Description: Simple Forms Plugin
Version: 1.0.0
Author: Milos Roknic
Text Domain: simple-forms
 */

defined('ABSPATH') or die('You cannot access this file.');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
  require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use SimpleForms\Base\Activate;
use SimpleForms\Base\Deactivate;
use SimpleForms\Init;

/**
 * Code that runs during plugin activation
 */
function activate_simple_forms_plugin() {
  Activate::activate();
}

register_activation_hook(__FILE__, 'activate_simple_forms_plugin');

/**
 * Code that runs during plugin deactivation
 */
function deactivate_simple_forms_plugin() {
  Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_simple_forms_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('SimpleForms\\Init')) {
  Init::register_services();
}
