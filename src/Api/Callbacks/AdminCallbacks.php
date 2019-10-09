<?php

/**
 * @package SimpleForms
 */

namespace SimpleForms\Api\Callbacks;


use SimpleForms\Base\BaseController;

class AdminCallbacks extends BaseController {

  public function getDashboardTemplate() {
    return require_once ("{$this->pluginPath}/templates/admin/dashboard.php");
  }

  public function getAddFormTemplate() {
    return require_once ("{$this->pluginPath}/templates/admin/add-form.php");
  }

  public function getSubmissionsTemplate() {
    return require_once ("{$this->pluginPath}/templates/admin/submissions.php");
  }

}
