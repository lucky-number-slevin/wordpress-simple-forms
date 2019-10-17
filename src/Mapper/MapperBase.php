<?php


namespace SimpleForms\Mapper;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use SimpleForms\Storage\Database;


/**
 * Class MapperBase
 * @package SimpleForms\Mapper
 */
abstract class MapperBase implements MapperInterface {

  /**
   * @var EntityManager
   */
  private $entityManager;

  /**
   * MapperBase constructor.
   */
  public function __construct() {
    $this->entityManager = Database::getConnection()->getEntityManager();
  }

  /**
   * @param string $class
   * @return ObjectRepository|EntityRepository
   */
  public function getRepository(string $class) {
    return $this->entityManager->getRepository($class);
  }

}
