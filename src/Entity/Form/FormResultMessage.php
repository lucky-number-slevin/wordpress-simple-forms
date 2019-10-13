<?php


namespace SimpleForms\Entity\Form;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;


/**
 * Class FormResultMessage
 * @package SimpleForms\Entity\Form
 *
 * @Mapping\Entity
 * @Mapping\Table(name="form_result_message")
 */
class FormResultMessage extends EntityBase {

  /**
   * @var FormResultCalculator
   * @Mapping\ManyToOne(targetEntity="FormResultMessage", inversedBy="formResultMessages")
   * @Mapping\Column(name="form_result_calculator_id")
   */
  private $formResultCalculator;

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $label;

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $description;

  /**
   * @var int
   * @Mapping\Column(type="integer")
   */
  private $level;

  /**
   * @return FormResultCalculator
   */
  public function getFormResultCalculator() {
    return $this->formResultCalculator;
  }

  /**
   * @param FormResultCalculator $formResultCalculator
   */
  public function setFormResultCalculator(FormResultCalculator $formResultCalculator) {
    $this->formResultCalculator = $formResultCalculator;
  }

  /**
   * @return string
   */
  public function getLabel() {
    return $this->label;
  }

  /**
   * @param string $label
   */
  public function setLabel(string $label) {
    $this->label = $label;
  }

  /**
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * @param string $description
   */
  public function setDescription(string $description) {
    $this->description = $description;
  }

  /**
   * @return int
   */
  public function getLevel() {
    return $this->level;
  }

  /**
   * @param int $level
   */
  public function setLevel(int $level) {
    $this->level = $level;
  }

}
