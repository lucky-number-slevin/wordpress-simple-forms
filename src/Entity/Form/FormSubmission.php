<?php


namespace SimpleForms\Entity\Form;


use Doctrine\ORM\Mapping;
use DateTime;
use SimpleForms\Entity\EntityBase;


/**
 * Class FormSubmission
 * @package SimpleForms\Entity\Form
 *
 * @Mapping\Entity
 * @Mapping\Table(name="form_submission")
 */
class FormSubmission extends EntityBase {

  /**
   * @var Form
   * @Mapping\ManyToOne(targetEntity="Form", inversedBy="formSubmissions")
   * @Mapping\JoinColumn(name="form_id", referencedColumnName="id", nullable=false)
   */
  private $form;

  /**
   * @var DateTime
   * @Mapping\Column(type="datetime")
   */
  private $datetime;

  /**
   * @var array
   * @Mapping\ManyToMany(targetEntity="SimpleForms\Entity\Answer\AnswerValue", inversedBy="formSubmissions")
   * @Mapping\JoinTable(name="submission_values")
   */
  private $answerValues;

  /**
   * @param Form $form
   */
  public function setForm(Form $form) {
    $this->form = $form;
  }

  /**
   * @return Form
   */
  public function getForm() {
    return $this->form;
  }

  /**
   * @return array
   */
  public function getAnswerValues(): array {
    return $this->answerValues;
  }

  /**
   * @param array $answerValues
   */
  public function setAnswerValues(array $answerValues): void {
    $this->answerValues = $answerValues;
  }

  /**
   * @return DateTime
   */
  public function getDatetime() {
    return $this->datetime;
  }

  /**
   * @param DateTime $datetime
   */
  public function setDatetime(DateTime $datetime) {
    $this->datetime = $datetime;
  }

}
