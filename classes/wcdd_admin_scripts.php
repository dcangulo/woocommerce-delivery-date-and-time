<?php
class WcddAdminScripts {

  public function __construct() {
    add_action('admin_enqueue_scripts', [$this, 'wcdd_admin_dependencies']);
    add_action('admin_enqueue_scripts', [$this, 'wcdd_admin_scripts']);
  }

  public function wcdd_admin_scripts() {
    wp_register_script('wcdd-admin-script', WCDD_PLUGIN_ROOT_URL . '/scripts/wcdd-admin-script.js');
    wp_enqueue_script('wcdd-admin-script');
  }

  public function wcdd_admin_dependencies() {
    wp_register_style('wcdd-admin-flatpickr-style', WCDD_PLUGIN_ROOT_URL . '/dependencies/flatpickr.min.css');
    wp_enqueue_style('wcdd-admin-flatpickr-style');
    wp_register_script('wcdd-admin-flatpickr-script', WCDD_PLUGIN_ROOT_URL . '/dependencies/flatpickr.min.js');
    wp_enqueue_script('wcdd-admin-flatpickr-script');
  }

}
