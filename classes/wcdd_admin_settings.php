<?php
class WcddAdminSettings {

  public function __construct() {
    add_filter('woocommerce_settings_tabs_array', [$this, 'wcdd_add_delivery_date'], 50);
    add_action('woocommerce_settings_tabs_delivery_date', [$this, 'wcdd_delivery_date']);
    add_action('woocommerce_update_options_delivery_date', [$this, 'wcdd_update_settings']);
  }

  public function wcdd_add_delivery_date($tabs) {
    $tabs['delivery_date'] = __('Delivery Date', 'woocommerce-delivery-date');

    return $tabs;
  }

  public function wcdd_delivery_date() {
    woocommerce_admin_fields($this->get_settings());
  }

  public function wcdd_update_settings() {
    woocommerce_update_options($this->get_settings());
  }

  public function get_settings() {
    $settings = [
      'section_title' => [
        'name' => __('Delivery Date', 'woocommerce-delivery-date'),
        'type' => 'title'
      ],
      'preparation_days' => [
        'name' => __('Preparation Days', 'woocommerce-delivery-date'),
        'type' => 'number',
        'desc' => __('<br>The number of days to accept an order from today.', 'woocommerce-delivery-date'),
        'id' => 'wcdd_preparation_days'
      ],
      'disabled_dates' => [
        'name' => __('Disabled Dates', 'woocommerce-delivery-date'),
        'type' => 'text',
        'desc' => __('<br>The dates you want to be disabled.', 'woocommerce-delivery-date'),
        'id' => 'wcdd_disabled_dates',
        'class' => 'wcdd-date-multiple-picker'
      ],
      'start_time' => [
        'name' => __('Start Time', 'woocommerce-delivery-date'),
        'type' => 'text',
        'desc' => __('<br>The start time of the day where delivery will be accepted.', 'woocommerce-delivery-date'),
        'id' => 'wcdd_start_time',
        'class' => 'wcdd-time-picker'
      ],
      'end_time' => [
        'name' => __('End Time', 'woocommerce-delivery-date'),
        'type' => 'text',
        'desc' => __('<br>The end time of the day where delivery will be accepted.', 'woocommerce-delivery-date'),
        'id' => 'wcdd_end_time',
        'class' => 'wcdd-time-picker'
      ],
      'foreground_color' => [
        'name' => __('Foreground Color', 'woocommerce-delivery-date'),
        'type' => 'text',
        'desc' => __('<br>The foreground color of the calendar picker.', 'woocommerce-delivery-date'),
        'id' => 'wcdd_foreground_color'
      ],
      'background_color' => [
        'name' => __('Background Color', 'woocommerce-delivery-date'),
        'type' => 'text',
        'desc' => __('<br>The background color of the calendar picker.', 'woocommerce-delivery-date'),
        'id' => 'wcdd_background_color'
      ],
      'section_end' => [
        'type' => 'sectionend'
      ]
    ];

    return apply_filters('wcdd_settings', $settings);
  }

}
