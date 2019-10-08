<?php

namespace SimpleForms\Base;

class SettingsLink extends BaseController {

    function register() {
        add_filter("plugin_action_links_$this->pluginName", [$this, 'settings_link']);
    }

    public function settings_link($links) {
        $settings_link = '<a href="admin.php?page=simple_forms">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

}
