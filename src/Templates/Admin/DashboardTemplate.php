<?php


namespace SimpleForms\Templates\Admin;


use SimpleForms\Templates\TemplateManagerBase;

class DashboardTemplate extends TemplateManagerBase {

  const TEMPLATE_PATH = 'admin/dashboard.html.twig';
  const TEMPLATE_TITLE = 'Dashboard';

  public function renderTemplate() {
    parent::render(self::TEMPLATE_PATH);
  }

  public function getVariables() {
    return [
      'title' => self::TEMPLATE_TITLE
    ];
  }

}
