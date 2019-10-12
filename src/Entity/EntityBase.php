<?php


namespace SimpleForms\Entity;

use Doctrine\ORM\Mapping;

/**
 * Class EntityBase
 * @package SimpleForms\Entity
 *
 * @Mapping\MappedSuperclass
 */
abstract class EntityBase {

  /**
   * @var int
   * @Mapping\Id
   * @Mapping\Column(type="integer")
   * @Mapping\GeneratedValue
   */
  private $id;

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

}
