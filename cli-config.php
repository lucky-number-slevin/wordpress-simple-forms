<?php
/*
 * This file provides usage of Doctrine Command Line Interface.
 * Usage: ./vendor/bin/doctrine <command> [option] [arguments]
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use SimpleForms\Database;

$wp_root_path = dirname(__FILE__, 4);
$wp_config_path = $wp_root_path . '/wp-config.php';
if (!file_exists($wp_config_path)) {
  die('FILE DOESN\'T EXIST');
}

/**
 * Require wp-config to read DB_* constants needed to instantiate
 * SimpleForms\Database object.
 * NOTE: This is only needed in this case, when using CLI.
 */
require_once $wp_config_path;

$db = new Database();

return ConsoleRunner::createHelperSet($db->getEntityManager());
