<?php


namespace SimpleForms\Storage;


use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Events;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;


/**
 * Class Database
 * @package SimpleForms
 */
class Database {

  /**
   * @var EntityManager
   */
  private $entityManager;

  /**
   * Database constructor.
   */
  private function __construct() {
    $is_dev_mod = TRUE;
    $proxy_dir = NULL;
    $cache = NULL;
    $use_simple_annotation_reader = FALSE;

    $orm_config = Setup::createAnnotationMetadataConfiguration([dirname(__FILE__, 2)], $is_dev_mod, $proxy_dir, $cache, $use_simple_annotation_reader);

    $db_config = [
      'driver' => 'pdo_mysql',
      'user' => DB_USER,
      'password' => DB_PASSWORD,
      'dbname' => DB_NAME
    ];

    $event_manager = NULL;

    global $wpdb;
    $table_prefix_object = new TablePrefix($wpdb->prefix . 'sf_');
    $event_manager = new EventManager();
    $event_manager->addEventListener(Events::loadClassMetadata, $table_prefix_object);

    try {
      $this->entityManager = EntityManager::create($db_config, $orm_config, $event_manager);
    } catch (ORMException $e) {
      if (WP_DEBUG) {
        echo $e;
      }
    }
  }

  public static function getConnection() {
    return new Database();
  }

  /**
   * @return EntityManager
   */
  public function getEntityManager() {
    return $this->entityManager;
  }

}
