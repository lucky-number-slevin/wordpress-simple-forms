<?php


namespace SimpleForms\Pages;


use SimpleForms\Base\BaseController;

class Admin extends BaseController {

    function register() {
        add_action('admin_menu', [$this, 'add_admin_pages']);
    }

    public function add_admin_pages() {
        add_menu_page('Simple Forms Plugin', 'Simple Forms', 'manage_options', 'simple_forms', [
            $this, 'admin_index'
        ], 'dashicons-analytics', NULL);
    }

    public function admin_index() {
        // require template
        require_once $this->pluginPath . 'templates/admin.php';
    }

}
