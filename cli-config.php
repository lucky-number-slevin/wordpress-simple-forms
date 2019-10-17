<?php
/*
 * This file provides usage of Doctrine Command Line Interface.
 * Usage: ./vendor/bin/doctrine <command> [option] [arguments]
 */


use Doctrine\DBAL\DBALException;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use SimpleForms\Storage\Database;


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

$entityManager = Database::getConnection()->getEntityManager();

try {
  // get currently used platform
  $dbPlatform = $entityManager->getConnection()->getDatabasePlatform();
  // interpret BIT as boolean
  $dbPlatform->registerDoctrineTypeMapping('bit', 'boolean');
  $dbPlatform->registerDoctrineTypeMapping('enum', 'string');
} catch (DBALException $e) {
  var_dump($e);
}


return ConsoleRunner::createHelperSet($entityManager);
