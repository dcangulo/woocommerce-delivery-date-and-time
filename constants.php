<?php
define('WCDD_PLUGIN_ROOT_URL', plugins_url('woocommerce-delivery-date-and-time'));
define('WCDD_PLUGIN_INDEX_PATH', join('/', [WP_PLUGIN_DIR, 'woocommerce-delivery-date-and-time', 'index.php']));
define('WCDD_SETTINGS', [
  'preparation_days' => empty(get_option('wcdd_preparation_days')) ? 0 : get_option('wcdd_preparation_days'),
  'disabled_dates' => explode(', ', get_option('wcdd_disabled_dates')),
  'start_time' => empty(get_option('wcdd_start_time')) ? '0:00' : get_option('wcdd_start_time'),
  'end_time' => empty(get_option('wcdd_end_time')) ? '23:00' : get_option('wcdd_end_time'),
  'foreground_color' => empty(get_option('wcdd_foreground_color')) ? '#ffffff' : get_option('wcdd_foreground_color'),
  'background_color' => empty(get_option('wcdd_background_color')) ? '#ef5350' : get_option('wcdd_background_color'),
]);
