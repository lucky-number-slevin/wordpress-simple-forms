<?php


namespace SimpleForms\Mapper;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityRepository;
use ReflectionException;
use SimpleForms\Entity\Form\Form;


/**
 * Class FormMapper
 * @package SimpleForms\Mapper
 */
class FormMapper extends MapperBase {

  /**
   * @var ObjectRepository|EntityRepository
   */
  private $formRepository;

  /**
   * FormMapper constructor.
   */
  public function __construct() {
    parent::__construct();
    $this->formRepository = $this->getRepository(Form::class);
  }

  /**
   * @param array $form_data
   * @return Form
   * @throws ReflectionException
   */
  public function arrayToEntity(array $form_data) {
    if (isset($form_data['id'])) {
      /** @var Form $form */
      $form = $this->formRepository->find($form_data['id']);
      return $form;
    }
    $form = new Form($form_data['type']);
    $form->setName($form_data['name']);
    return $form;
  }

  /**
   * @param $entity
   * @return array
   */
  public function entityToArray($entity) {
    // TODO: Implement entityToArray() method.
  }
}
