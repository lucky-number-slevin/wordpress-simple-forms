<?php


namespace SimpleForms\Entity\Answer;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;
use SimpleForms\Entity\Question\MultipleAnswerQuestion;


/**
 * Class Answer
 * @package SimpleForms\Entity\Answer
 *
 * @Mapping\Entity
 * @Mapping\Table(name="answer")
 */
class Answer extends EntityBase {

  /**
   * @var MultipleAnswerQuestion
   * @Mapping\ManyToOne(targetEntity="SimpleForms\Entity\Question\MultipleAnswerQuestion", inversedBy="answers")
   * @Mapping\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
   */
  private $question;

  /**
   * @var bool
   * Multi-answer questions don't need to be a part of
   * form score calculation. For example, radio button
   * can be used for "male or female" question which is
   * not part of form score calculation
   * @Mapping\Column(type="boolean", name="is_calculable")
   */
  private $isCalculable;

  /**
   * @var AnswerValue
   * @Mapping\OneToMany(targetEntity="AnswerValue", mappedBy="answer", cascade={"persist", "remove"})
   */
  private $answerValues;

  /**
   * @return MultipleAnswerQuestion
   */
  public function getQuestion() {
    return $this->question;
  }

  /**
   * @param MultipleAnswerQuestion $question
   */
  public function setQuestion(MultipleAnswerQuestion $question) {
    $this->question = $question;
  }

  /**
   * @return bool
   */
  public function isCalculable() {
    return $this->isCalculable;
  }

  /**
   * @param bool $isCalculable
   */
  public function setIsCalculable(bool $isCalculable) {
    $this->isCalculable = $isCalculable;
  }

  /**
   * @return AnswerValue
   */
  public function getAnswerValues() {
    return $this->answerValues;
  }

  /**
   * @param AnswerValue $answerValues
   */
  public function setAnswerValues(AnswerValue $answerValues) {
    $this->answerValues = $answerValues;
  }

}
