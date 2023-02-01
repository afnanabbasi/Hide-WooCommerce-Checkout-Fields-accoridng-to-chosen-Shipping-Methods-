add_filter('woocommerce_checkout_fields', 'wpcp_remove_shipping_fields');

function wpcp_remove_shipping_fields($fields) {
    $shipping_method ='local_pickup:1'; // Set the desired shipping method to hide the checkout field(s) for.
    global $woocommerce;
    $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
    $chosen_shipping = $chosen_methods[0];

    if ($chosen_shipping == $shipping_method) {       
        // Add/change filed name to be hide
        unset($fields['billing']['billing_address_1']);
        unset($fields['billing']['billing_address_2']);
		    unset($fields['billing']['billing_city']);
		    unset($fields['billing']['billing_state']);
		    unset($fields['billing']['billing_postcode']);
    }
    return $fields;
}
