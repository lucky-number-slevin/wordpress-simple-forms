<?php


namespace SimpleForms\Entity;


/**
 * Base class for Entities that will be persisted
 * in database
 *
 * @package SimpleForms\Entity
 */
abstract class PersistenceEntity {

  private $id;

  public function setId(int $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  /**
   * Returns configuration that will be used to
   * create table and columns in database
   *
   * @return array
   */
  public abstract function entityDefinition();

}
