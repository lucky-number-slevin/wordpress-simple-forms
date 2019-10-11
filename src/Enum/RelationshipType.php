<?php


namespace SimpleForms\Enum;


/**
 * Class RelationshipType - provides entity relationship types
 * to be used to define tables in db for those entities
 *
 * @package SimpleForms\Enum
 */
class RelationshipType {

  const ONE_TO_MANY = 'ONE_TO_MANY';
  const MANY_TO_ONE = 'MANY_TO_ONE';
  const ONE_TO_ONE = 'ONE_TO_ONE';
  const MANY_T0_MANY = 'MANY_T0_MANY';
}
