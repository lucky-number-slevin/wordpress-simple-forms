<?php


namespace SimpleForms\Templates\Admin;


use SimpleForms\Templates\TemplateManagerBase;

class SubmissionsTemplate extends TemplateManagerBase {

  const TEMPLATE_PATH = 'admin/submissions.html.twig';
  const TEMPLATE_TITLE = 'Submissions';

  public function renderTemplate() {
    parent::render(self::TEMPLATE_PATH);
  }

  public function getVariables() {
    return [
      'title' => self::TEMPLATE_TITLE
    ];
  }

}
