<?php


namespace SimpleForms\Entity\Form;


use Doctrine\ORM\Mapping;
use SimpleForms\Enum\FormType;

/**
 * Class Form
 * @package SimpleForms\Entity
 *
 * @Mapping\Entity
 * @Mapping\Table(name="form")
 */
class Form {

  /**
   * @var int
   * @Mapping\Id
   * @Mapping\Column(type="integer")
   * @Mapping\GeneratedValue
   */
  private $id;
  /**
   * @var string
   * @Mapping\Column(type="string")
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

  public function __construct(string $type) {
    $this->setType($type);
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  public function setType(string $type) {
    if (FormType::isValid($type)) {
      $this->type = $type;
    }
  }

  public function getType() {
    return $this->type;
  }

  public function setFields(array $fields) {
    $this->fields = $fields;
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
