<?php


namespace SimpleForms\Mapper;


/**
 * Interface MapperInterface
 * @package SimpleForms\Mapper
 */
interface MapperInterface {

  /**
   * @param array $data
   * @return mixed
   */
  public function arrayToEntity(array $data);

  /**
   * @param $entity
   * @return array
   */
  public function entityToArray($entity);

}
