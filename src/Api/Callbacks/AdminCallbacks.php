<?php

/**
 * @package SimpleForms
 */

namespace SimpleForms\Api\Callbacks;


use SimpleForms\Base\BaseController;

class AdminCallbacks extends BaseController {

  public function adminDashboard() {
    return require_once ("{$this->pluginPath}/templates/admin/dashboard.php");
  }

}
