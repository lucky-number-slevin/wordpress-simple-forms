<?php


namespace SimpleForms\Entity\Form;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;


/**
 * Class FormCalculator
 * @package SimpleForms\Entity\Form
 *
 * @Mapping\Entity
 * @Mapping\Table(name="form_calculator")
 */
class FormCalculator extends EntityBase {

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $name;

  /**
   * @var Form
   * @Mapping\ManyToOne(targetEntity="Form", inversedBy="formCalculators")
   * @Mapping\JoinColumn(name="form_id", referencedColumnName="id", nullable=false)
   */
  private $form;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="SimpleForms\Entity\Answer\AnswerValue", mappedBy="formCalculator", cascade={"persist", "remove"})
   */
  private $answerValues;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="FormResultMessage", mappedBy="formCalculator", cascade={"persist", "remove"})
   */
  private $formResultMessages;


  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name) {
    $this->name = $name;
  }

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
