<?php


namespace SimpleForms\Entity;


class FormResults extends PersistenceEntity {

  /**
   * @var Form
   */
  private $form;
  /**
   * @var float
   */
  private $percentage;
  /**
   * @var FormResultMessage
   */
  private $resultMessage;

  public function setForm(Form $form) {
    $this->form = $form;
  }

  public function getForm() {
    return $this->form;
  }

  /**
   * @return float
   */
  public function getPercentage() {
    return $this->percentage;
  }

  /**
   * @param float $percentage
   */
  public function setPercentage(float $percentage) {
    $this->percentage = $percentage;
  }

  /**
   * @return FormResultMessage
   */
  public function getResultMessage() {
    return $this->resultMessage;
  }

  /**
   * @param FormResultMessage $resultMessage
   */
  public function setResultMessage(FormResultMessage $resultMessage) {
    $this->resultMessage = $resultMessage;
  }

}
