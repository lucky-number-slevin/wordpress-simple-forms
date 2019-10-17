<?php


namespace SimpleForms\Entity\Answer;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;
use SimpleForms\Entity\Form\FormCalculator;


/**
 * Class Value
 * @package SimpleForms\Entity\Answer
 *
 * @Mapping\Entity
 * @Mapping\Table(name="answer_value")
 */
class AnswerValue extends EntityBase {

  /**
   * @var Answer
   * @Mapping\ManyToOne(targetEntity="Answer", inversedBy="answerValues")
   * @Mapping\JoinColumn(name="answer_id", referencedColumnName="id", nullable=false)
   */
  private $answer;

  /**
   * @var float
   * @Mapping\Column(type="string")
   */
  private $value;

  /**
   * @var FormCalculator
   * @Mapping\ManyToOne(targetEntity="SimpleForms\Entity\Form\FormCalculator", inversedBy="answerValues")
   * @Mapping\JoinColumn(name="form_calculator_id", referencedColumnName="id", nullable=false)
   */
  private $formCalculator;

  /**
   * @var array
   * @Mapping\ManyToMany(targetEntity="SimpleForms\Entity\Form\FormSubmission", mappedBy="answerValues")
   */
  private $formSubmissions;

  /**
   * @return Answer
   */
  public function getAnswer() {
    return $this->answer;
  }

  /**
   * @param Answer $answer
   */
  public function setAnswer(Answer $answer) {
    $this->answer = $answer;
  }

  /**
   * @return float
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * @param float $value
   */
  public function setValue(float $value) {
    $this->value = $value;
  }

  /**
   * @return FormCalculator
   */
  public function getFormCalculator() {
    return $this->formCalculator;
  }

  /**
   * @param FormCalculator $formCalculator
   */
  public function setFormCalculator(FormCalculator $formCalculator) {
    $this->formCalculator = $formCalculator;
  }

  /**
   * @return array
   */
  public function getFormSubmissions() {
    return $this->formSubmissions;
  }

  /**
   * @param array $formSubmissions
   */
  public function setFormSubmissions(array $formSubmissions) {
    $this->formSubmissions = $formSubmissions;
  }

}
