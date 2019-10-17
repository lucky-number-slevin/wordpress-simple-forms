<?php


namespace SimpleForms\Entity\Question;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;
use SimpleForms\Entity\Form\Form;
use SimpleForms\Enum\QuestionType;


/**
 * Class SingleAnswerQuestion
 * @package SimpleForms\Entity\Question
 *
 * @Mapping\Entity
 * @Mapping\Table(name="single_answer_question")
 */
class SingleAnswerQuestion extends EntityBase {

  /**
   * @var Form
   * @Mapping\ManyToOne(targetEntity="SimpleForms\Entity\Form\Form", inversedBy="singleAnswerQuestions")
   * @Mapping\JoinColumn(name="form_id", referencedColumnName="id", nullable=false)
   */
  private $form;

  /**
   * @var string
   * $type should always be QuestionType::TEXT_INPUT
   * and should not have setter, only getter
   * @Mapping\Column(type="string")
   */
  private $type = QuestionType::TEXT_INPUT;

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $answer;

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
   * @return string
   */
  public function getType(): string {
    return $this->type;
  }

  /**
   * @return string
   */
  public function getAnswer() {
    return $this->answer;
  }

  /**
   * @param string $answer
   */
  public function setAnswer(string $answer) {
    $this->answer = $answer;
  }

}
