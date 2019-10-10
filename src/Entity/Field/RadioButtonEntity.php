<?php


namespace SimpleForms\Entity\Field\RadioButton;

use SimpleForms\Entity\EntityBase;

class RadioButtonEntity extends EntityBase {

  private $id;

  const MAX_NUMBER_OF_OPTIONS = 10;

  /**
   * Returns entity settings that will be used
   * to create database table for this entity
   */
  public function getEntityDefinition() {

    $entity['id'] = [
      'autoincrement'
    ];

    $entity['from_id'] = [
      'foreign_key'
    ];

    $entity['type'] = [
      'data_type' => 'varchar',
      'value' => 'radio_button',
      'description' => 'Form field type'
    ];

    $entity['label'] = [
      'varchar'
    ];

    for($i = 0; $i < self::MAX_NUMBER_OF_OPTIONS; $i++) {
      $entity['option_' . ++$i] = [
        'varchar' => 'json: {
          value(int): label
        }'
      ];
    }

    $entity['description'] = [
      'varchar'
    ];

    return $entity;
  }

}
