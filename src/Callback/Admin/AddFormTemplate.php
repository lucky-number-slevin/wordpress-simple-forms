<?php


namespace SimpleForms\Callback\Admin;


use SimpleForms\TemplateManagerBase;


class AddFormTemplate extends TemplateManagerBase {

  const TEMPLATE_PATH = 'admin/add-form.html.twig';
  const TEMPLATE_TITLE = 'Add Form';

  public function renderTemplate() {
    parent::render(self::TEMPLATE_PATH, [
      'title' => self::TEMPLATE_TITLE
    ]);
  }

}
