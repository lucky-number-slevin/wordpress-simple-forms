<?php


namespace SimpleForms;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

class Database {

  private $entityManager;

  public function __construct() {
    $is_dev_mod = TRUE;
    $proxy_dir = NULL;
    $cache = NULL;
    $use_simple_annotation_reader = FALSE;

    $orm_config = Setup::createAnnotationMetadataConfiguration([__DIR__], $is_dev_mod, $proxy_dir, $cache, $use_simple_annotation_reader);

    $db_config = [
      'driver' => 'pdo_mysql',
      'user' => 'jazas',
      'password' => 'jazas',
      'dbname' => 'jazas'
    ];

    try {
      $this->entityManager = EntityManager::create($db_config, $orm_config);
    } catch (ORMException $e) {
      if (WP_DEBUG) {
        echo $e;
      }
    }
  }

  public function getEntityManager() {
    return $this->entityManager;
  }

}
