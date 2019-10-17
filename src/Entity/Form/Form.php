<?php


namespace SimpleForms\Entity\Form;


use Doctrine\ORM\Mapping;
use SimpleForms\Entity\EntityBase;
use SimpleForms\Enum\FormType;


/**
 * Class Form
 * @package SimpleForms\Entity
 *
 * @Mapping\Entity
 * @Mapping\Table(name="form")
 */
class Form extends EntityBase {

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $type;

  /**
   * @var string
   * @Mapping\Column(type="string")
   */
  private $name;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="SimpleForms\Entity\Question\SingleAnswerQuestion", mappedBy="form", cascade={"persist", "remove"})
   */
  private $singleAnswerQuestions;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="SimpleForms\Entity\Question\MultipleAnswerQuestion", mappedBy="form", cascade={"persist", "remove"})
   */
  private $multipleAnswerQuestions;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="FormCalculator", mappedBy="form", cascade={"persist", "remove"})
   */
  private $formCalculators;

  /**
   * @var array
   * @Mapping\OneToMany(targetEntity="FormSubmission", mappedBy="form", cascade={"persist", "remove"})
   */
  private $formSubmissions;

  /**
   * Form constructor.
   * @param string $type
   * @throws \ReflectionException
   */
  public function __construct(string $type) {
    $this->setType($type);
  }

  /**
   * @param string $type
   * @throws \ReflectionException
   */
  public function setType(string $type) {
    if (FormType::isValid($type)) {
      $this->type = $type;
    }
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

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
   * @return array
   */
  public function getSingleAnswerQuestions() {
    return $this->singleAnswerQuestions;
  }

  /**
   * @param array $singleAnswerQuestions
   */
  public function setSingleAnswerQuestions(array $singleAnswerQuestions) {
    $this->singleAnswerQuestions = $singleAnswerQuestions;
  }

  /**
   * @return array
   */
  public function getMultipleAnswerQuestions() {
    return $this->multipleAnswerQuestions;
  }

  /**
   * @param array $multipleAnswerQuestions
   */
  public function setMultipleAnswerQuestions(array $multipleAnswerQuestions) {
    $this->multipleAnswerQuestions = $multipleAnswerQuestions;
  }

  /**
   * @return array
   */
  public function getFormCalculators() {
    return $this->formCalculators;
  }

  /**
   * @param array $formCalculators
   */
  public function setFormCalculators(array $formCalculators) {
    /** @var FormCalculator $calculator */
    foreach ($formCalculators as &$calculator) {
      $calculator->setForm($this);
    }
    $this->formCalculators = $formCalculators;
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
