<?php
class WcddFormFieldScripts {

  public function __construct() {
    add_action('wp_enqueue_scripts', [$this, 'wcdd_scripts']);
    add_action('wp_enqueue_scripts', [$this, 'wcdd_dependencies']);
  }

  public function wcdd_scripts() {
    wp_register_style('wcdd-style', WCDD_PLUGIN_ROOT_URL . '/scripts/wcdd-style.css');
    wp_enqueue_style('wcdd-style');
    wp_register_script('wcdd-script', WCDD_PLUGIN_ROOT_URL . '/scripts/wcdd-script.js');
    wp_enqueue_script('wcdd-script');
    wp_localize_script('wcdd-script', 'wcdd', [
      'settings' => WCDD_SETTINGS,
    ]);
  }

  public function wcdd_dependencies() {
    wp_register_style('wcdd-flatpickr-style', WCDD_PLUGIN_ROOT_URL . '/dependencies/flatpickr.min.css');
    wp_enqueue_style('wcdd-flatpickr-style');
    wp_register_script('wcdd-flatpickr-script', WCDD_PLUGIN_ROOT_URL . '/dependencies/flatpickr.min.js');
    wp_enqueue_script('wcdd-flatpickr-script');
  }

}
