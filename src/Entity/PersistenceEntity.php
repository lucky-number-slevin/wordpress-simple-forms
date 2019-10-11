<?php


namespace SimpleForms\Entity;


/**
 * Base class for Entities that will be persisted in
 * database
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

//  /**
//   * Returns configuration that will be used to create
//   * table and columns in database. If ID is not provided,
//   * it will be autoincrement integer
//   *
//   * @return array
//   */
//  public abstract function entityDefinition();
//
//  /**
//   * Returns array of all classes that this entity is
//   * dependent on. These dependencies will be used to create
//   * foreign key column in db table for this entity.
//   *
//   * @return array
//   */
//  public abstract function entityDependencies();

}
