<?php


namespace SimpleForms\Callback\Admin;


use SimpleForms\TemplateManagerBase;


class DashboardTemplate extends TemplateManagerBase {

  const TEMPLATE_PATH = 'admin/dashboard.html.twig';
  const TEMPLATE_TITLE = 'Dashboard';

  public function renderTemplate() {
    parent::render(self::TEMPLATE_PATH, [
      'title' => self::TEMPLATE_TITLE,
    ]);
  }

}
