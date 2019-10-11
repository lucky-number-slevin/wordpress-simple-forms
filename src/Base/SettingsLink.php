<?php

namespace SimpleForms\Base;

use SimpleForms\PluginBase;

class SettingsLink extends PluginBase {

  function register() {
    add_filter("plugin_action_links_{$this->getPluginName()}", [$this, 'settingsLink']);
  }

  public function settingsLink($links) {
    $settings_link = '<a href="admin.php?page=simple_forms">Settings</a>';
    array_push($links, $settings_link);
    return $links;
  }

}
