<?php
/**
 * @package SimpleForms
 */


namespace SimpleForms;


use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use SimpleForms\Storage\Database;


class Activate {

  public static function activate() {

    $entity_manager = Database::getConnection()->getEntityManager();
    $schema_tool = new SchemaTool($entity_manager);
    $classes_meta_data = $entity_manager->getMetadataFactory()->getAllMetadata();
    try {
      $schema_tool->createSchema($classes_meta_data);
    } catch (ToolsException $e) {
      // In case table already exists, this exception will be triggered
    }

    flush_rewrite_rules();
  }

}
