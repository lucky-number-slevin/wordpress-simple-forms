<?php


namespace SimpleForms\Entity\Answer;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;
use SimpleForms\Entity\Form\FormResultCalculator;


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
   */
  private $answer;

  /**
   * @var float
   * @Mapping\Column(type="string")
   */
  private $value;

  /**
   * @var FormResultCalculator
   * @Mapping\ManyToOne(targetEntity="SimpleForms\Entity\Form\FormResultCalculator", inversedBy="answerValues")
   * @Mapping\Column(name="form_result_calculator_id")
   */
  private $formResultCalculator;

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
