<?php


namespace SimpleForms\Mapper;


use SimpleForms\Entity\Form\Form;


/**
 * Class FormMapper
 * @package SimpleForms\Mapper
 */
class FormMapper {

  /**
   * @param array $form_data
   * @return Form
   * @throws \ReflectionException
   */
  public function jsonToEntity(array $form_data) {
    if (isset($form_data['id'])) {
      // TODO: load form from db and return it
    }
    $form = new Form($form_data['type']);
    $form->setName($form_data['name']);
    return $form;
  }

}
