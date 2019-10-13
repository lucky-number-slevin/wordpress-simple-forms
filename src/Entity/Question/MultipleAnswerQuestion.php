<?php


namespace SimpleForms\Entity\Question;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;
use SimpleForms\Entity\Form\Form;


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
   */
  private $form;

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $type;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="SimpleForms\Entity\Answer\Answer", mappedBy="question")
   */
  private $answers;

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
    $this->type = $type;
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
