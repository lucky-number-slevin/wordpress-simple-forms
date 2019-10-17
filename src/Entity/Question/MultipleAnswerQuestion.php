<?php


namespace SimpleForms\Entity\Question;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;
use SimpleForms\Entity\Form\Form;
use SimpleForms\Enum\QuestionType;


/**
 * Class MultipleAnswerQuestion
 * @package SimpleForms\Entity\Question
 *
 * @Mapping\Entity
 * @Mapping\Table(name="multiple_answer_question")
 */
class MultipleAnswerQuestion extends EntityBase {

  /**
   * @var Form
   * @Mapping\ManyToOne(targetEntity="SimpleForms\Entity\Form\Form", inversedBy="multipleAnswerQuestions")
   * @Mapping\JoinColumn(name="form_id", referencedColumnName="id", nullable=false)
   */
  private $form;

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $type;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="SimpleForms\Entity\Answer\Answer", mappedBy="question", cascade={"persist", "remove"})
   */
  private $answers;

  /**
   * MultipleAnswerQuestion constructor.
   * @param string $type
   */
  public function __construct(string $type) {
    if (QuestionType::isValidQuestionType($type, $this)) {
      $this->type = $type;
    }
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
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   */
  public function setType(string $type) {
    if (QuestionType::isValidQuestionType($type, $this)) {
      $this->type = $type;
    }
  }

  /**
   * @return array
   */
  public function getAnswers() {
    return $this->answers;
  }

  /**
   * @param array $answers
   */
  public function setAnswers(array $answers) {
    $this->answers = $answers;
  }

}
