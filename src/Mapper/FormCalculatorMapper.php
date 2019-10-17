<?php


namespace SimpleForms\Mapper;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityRepository;
use SimpleForms\Entity\Form\Form;
use SimpleForms\Entity\Form\FormCalculator;


/**
 * Class FormCalculatorMapper
 * @package SimpleForms\Mapper
 */
class FormCalculatorMapper extends MapperBase {

  /**
   * @var ObjectRepository|EntityRepository
   */
  private $formCalculatorRepository;

  /**
   * @var ObjectRepository|EntityRepository
   */
  private $formRepository;

  public function __construct() {
    parent::__construct();
    $this->formCalculatorRepository = $this->getRepository(FormCalculator::class);
    $this->formRepository = $this->getRepository(Form::class);
  }

  /**
   * @param array $form_calculator_data
   * @return FormCalculator
   */
  public function arrayToEntity(array $form_calculator_data) {
    if (isset($form_calculator_data['id'])) {
      /** @var FormCalculator $form_calculator */
      $form_calculator = $this->formCalculatorRepository->find($form_calculator_data['id']);
      return $form_calculator;
    }

    $form_calculator = new FormCalculator();
    $form_calculator->setName($form_calculator_data['name']);
    if(isset($form_calculator_data['form_id'])) {
      /** @var Form $form */
      $form = $this->formRepository->find($form_calculator_data['form_id']);
      $form_calculator->setForm($form);
    }

    return $form_calculator;
  }

  /**
   * @param $entity
   * @return array
   */
  public function entityToArray($entity) {
    // TODO: Implement entityToArray() method.
  }
}
