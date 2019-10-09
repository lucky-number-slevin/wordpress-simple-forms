<?php


namespace SimpleForms\Templates\Admin;


use SimpleForms\Templates\TemplateManagerBase;

class AddFormTemplate extends TemplateManagerBase {

  const TEMPLATE_PATH = 'admin/add-form.html.twig';
  const TEMPLATE_TITLE = 'Add Form';

  public function renderTemplate() {
    parent::render(self::TEMPLATE_PATH);
  }

  public function getVariables() {
    return [
      'title' => self::TEMPLATE_TITLE
    ];
  }

}
