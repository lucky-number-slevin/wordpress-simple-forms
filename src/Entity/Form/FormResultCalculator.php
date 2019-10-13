<?php


namespace SimpleForms\Entity\Form;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;


/**
 * Class FormResultCalculator
 * @package SimpleForms\Entity\Form
 *
 * @Mapping\Entity
 * @Mapping\Table(name="form_result_calculator")
 */
class FormResultCalculator extends EntityBase {

  /**
   * @var Form
   * @Mapping\ManyToOne(targetEntity="Form", inversedBy="formResultCalculators")
   */
  private $form;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="SimpleForms\Entity\Answer\AnswerValue", mappedBy="formResultCalculator")
   */
  private $answerValues;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="FormResultMessage", mappedBy="formResultCalculator")
   */
  private $formResultMessages;

  /**
   * @return Form
   */
  public function getForm() {
    return $this->form;
  }

  /**
   * @param Form $form
   */
  public function setForm(Form $form) {
    $this->form = $form;
  }

  /**
   * @return array
   */
  public function getAnswerValues() {
    return $this->answerValues;
  }

  /**
   * @param array $answerValues
   */
  public function setAnswerValues(array $answerValues) {
    $this->answerValues = $answerValues;
  }

  /**
   * @return array
   */
  public function getFormResultMessages() {
    return $this->formResultMessages;
  }

  /**
   * @param array $formResultMessages
   */
  public function setFormResultMessages(array $formResultMessages) {
    $this->formResultMessages = $formResultMessages;
  }

}
