<?php


namespace SimpleForms\Entity;


use FormType;
use SimpleForms\Entity\Field\FieldBase;

class Form extends PersistenceEntity {

  /**
   * @var FormType
   */
  private $type;
  /**
   * @var array
   */
  private $fields;
  /**
   * @var FormResultCalculator
   */
  private $formResultCalculators;

  public function __construct(FormType $type) {
    $this->type = $type;
  }

  public function setType(FormType $type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }

  public function setFields(array $fields) {
    $this->fields = $fields;
  }

  public function addField(FieldBase $field) {
    $this->fields[$field->getId()] = $field;
  }

  public function setFormResultCalculator(array $form_result_calculators) {
    $this->formResultCalculators = $form_result_calculators;
  }

  public function getMaxScore(FormResultCalculator $calculator) {
    $max_score = 0;
//    foreach ($this->fields as $field) {
//      foreach ($field->options as $option) {
//        $option_max_score = 0;
//        foreach ($option->values as $option_value) {
//          switch (get_class($field)) {
//            case RadioButton::class:
//              if ($option_value->formResultCalculator == $calculator && $option_value->value > $option_max_score) {
//                $option_max_score = $option_value->value;
//              }
//              break;
//            case Checkbox::class:
//              if ($option_value->formResultCalculator == $calculator) {
//                $option_max_score += $option_value->value;
//              }
//              break;
//          }
//        }
//        $max_score += $option_max_score;
//      }
//    }
  }

}
