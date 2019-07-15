<?php
class WcddFormField {

  public function __construct() {
    add_action('woocommerce_after_checkout_billing_form', [$this, 'wcdd_field']);
    add_action('woocommerce_checkout_process', [$this, 'wcdd_field_validate']);
    add_action('woocommerce_checkout_update_order_meta', [$this, 'wcdd_update_order_meta']);
    add_action('woocommerce_admin_order_data_after_billing_address', [$this, 'wcdd_display_on_admin_edit']);
    add_filter('woocommerce_admin_order_preview_get_order_details', [$this, 'wcdd_get_order_preview_data'], 10, 2);
    add_action('woocommerce_admin_order_preview_start', [$this, 'wcdd_display_on_admin_preview']);
    add_action('woocommerce_order_details_after_customer_details', [$this, 'wcdd_display_on_client_view_order']);
    add_action('woocommerce_email_after_order_table', [$this, 'wcdd_display_on_email']);
  }

  public function wcdd_field($checkout) {
    woocommerce_form_field('delivery_date', [
      'type' => 'text',
      'class' => ['form-row-wide validate-required'],
      'input_class' => ['wcdd-date-time-field'],
      'label' => __('Delivery Date'),
      'required' => true
    ], $checkout->get_value('delivery_date'));
  }

  public function wcdd_field_validate() {
    if ( isset($_POST['delivery_date']) && !empty($_POST['delivery_date']) ) return;

    wc_add_notice(__('<strong>Delivery Date</strong> is a required field.'), 'error');
  }

  public function wcdd_update_order_meta($order_id) {
    if ( empty($_POST['delivery_date']) ) return;

    update_post_meta($order_id, 'delivery_date', sanitize_text_field($_POST['delivery_date']));
  }

  public function wcdd_display_on_admin_edit($order){
    $date = date_create($order->get_meta('delivery_date'));

    echo '
      <p>
        <strong>' . __('Delivery Date') . ':</strong>
        <br>' . date_format($date, WCDD_DATETIME_FORMAT) .
      '</p>
    ';
  }

  public function wcdd_get_order_preview_data($data, $order) {
    $date = date_create($order->get_meta('delivery_date'));
    $data['delivery_date'] = date_format($date, WCDD_DATETIME_FORMAT);

    return $data;
  }

  public function wcdd_display_on_admin_preview(){
    echo '
      <div style="padding: 1.5em 1.5em 0;">
        <strong>Delivery Date</strong>
        <br>{{data.delivery_date}}
      </div>
    ';
  }

  public function wcdd_display_on_client_view_order($order) {
    $date = date_create($order->get_meta('delivery_date'));

    echo '<h2>Delivery Date</h2>' . date_format($date, WCDD_DATETIME_FORMAT);
  }

  public function wcdd_display_on_email($order) {
    $date = date_create($order->get_meta('delivery_date'));

    echo '<h2>Delivery Date</h2>' . date_format($date, WCDD_DATETIME_FORMAT) . '<br><br>';
  }

}
