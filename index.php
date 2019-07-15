<?php
/*
  Plugin Name: WooCommerce Delivery Date and Time
  Plugin URI: https://github.com/dcangulo/woocommerce-delivery-date-and-time
  Description: Adds a delivery date and time field on checkout page.
  Version: 1.0.0
  Author: David Angulo
  Author URI: https://www.davidangulo.xyz/
  Requires at least: 5.0.0
  Tested Up to: 5.2.2
  License: GPL2
  Requires PHP: 7.0
  WC requires at least: 3.6.5
  WC tested up to: 3.6.5
*/

/*
  Copyright 2019 David Angulo (email: hello@davidangulo.xyz)
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
*/

require_once('constants.php');
require_once('classes/wcdd_checker.php');
require_once('classes/wcdd_admin_scripts.php');
require_once('classes/wcdd_admin_settings.php');
require_once('classes/wcdd_form_field_scripts.php');
require_once('classes/wcdd_form_field.php');



new WcddChecker();
new WcddAdminScripts();
new WcddAdminSettings();
new WcddFormFieldScripts();
new WcddFormField();
