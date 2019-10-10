<?php


namespace SimpleForms\Callback\Admin;


use SimpleForms\TemplateManagerBase;

class SubmissionsTemplate extends TemplateManagerBase {

  const TEMPLATE_PATH = 'admin/submissions.html.twig';
  const TEMPLATE_TITLE = 'Submissions';

  public function renderTemplate() {
    parent::render(self::TEMPLATE_PATH, [
      'title' => self::TEMPLATE_TITLE
    ]);
  }
}
