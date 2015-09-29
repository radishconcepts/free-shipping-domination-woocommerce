<?php

/*
Plugin Name: Free Shipping Domination for WooCommerce
Description: If the free shipping method is available (either through coupon or minimum price requirement), this plugin disables all other shipping methods.
Author: Radish Concepts
Author URI: http://www.radishconcepts.com
Version: 1.0.0
*/

// Make sure the add_filter function exists before using it, so this file can
// be included in unit tests where it won't exists
if ( function_exists( 'add_filter' ) ) {
	add_filter( 'woocommerce_package_rates', 'fsdwc_woocommerce_package_rates', 10, 1 );

	// This is the old filter, pre WooCommerce 2.1, for backwards compatibility
	add_filter( 'woocommerce_available_shipping_methods', 'fsdwc_woocommerce_package_rates' , 10, 1 );
}

/**
 * Filters the array storing all available shipping rates on checkout and cart
 * Remove all other available shipping rates, if free is available
 *
 * @param $rates array Available rates for this
 * @return array Filtered version of the $rates parameter to this function
 */
function fsdwc_woocommerce_package_rates( $rates ) {
	// Only modify rates if free_shipping is present
	if ( isset( $rates['free_shipping'] ) ) {
		$free_shipping          = $rates['free_shipping'];
		$rates                  = array();
		$rates['free_shipping'] = $free_shipping;
	}

	return $rates;
}