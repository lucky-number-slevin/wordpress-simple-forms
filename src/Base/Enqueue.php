<?php


namespace SimpleForms\Base;


class Enqueue extends BaseController {

    public function register() {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    function enqueue() {
        wp_enqueue_style('simple_forms_style', $this->pluginUrl . 'assets/style.css');
        wp_enqueue_script('simple_forms_script', $this->pluginUrl . 'assets/script.js');
    }
}
