<?php
/**
 * This file disables trackbacks and pingbacks.
 */

class Kissws_Simple_Tweaks_Disable_Pings {

	public static function init() {
		add_filter( 'xmlrpc_methods', array( __CLASS__, 'remove_xmlrpc_methods' ) );
	}

	public static function remove_xmlrpc_methods( $methods ) {
		unset( $methods['pingback.ping'] );
		unset( $methods['xmlrpc_methods'] );
		return $methods;
	}

}