<?php
class WcddChecker {

  public function __construct() {
    add_action('admin_init', [$this, 'wcdd_check_woocommerce']);
  }

  public function wcdd_check_woocommerce() {
    if ( class_exists('WooCommerce') ) return;
    if ( !is_plugin_active(plugin_basename(WCDD_PLUGIN_INDEX_PATH)) ) return;

    deactivate_plugins(plugin_basename(WCDD_PLUGIN_INDEX_PATH));
    add_action('admin_notices', [$this, 'wcdd_woocommerce_disabled_message']);

    if ( isset($_GET['activate']) ) unset($_GET['activate']);
  }

  public function wcdd_woocommerce_disabled_message() {
    $class = 'notice notice-error';
    $message = __('WooCommerce Delivery Date and Time plugin requires WooCommerce installed and activate.', 'order-delivery-date' );

    printf('<div class="%1$s"><p>%2$s</p></div>', $class, $message);
  }

}
