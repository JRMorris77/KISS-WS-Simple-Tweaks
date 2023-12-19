<?php
/**
 * This file disables comments across all posts and pages.
 */

class Kissws_Simple_Tweaks_Disable_Comments {

	public static function init() {
		add_action( 'widgets_init', array( __CLASS__, 'remove_comments_widgets' ) );
		add_filter( 'comments_open', array( __CLASS__, 'close_comments_by_default' ), 10, 2 );
		add_filter( 'pings_open', array( __CLASS__, 'close_pings_by_default' ), 10, 2 );
	}

	public static function remove_comments_widgets() {
		unregister_widget( 'WP_Comments_Widget' );
		unregister_widget( 'WP_Comments_Recent_Posts_Widget' );
	}

	public static function close_comments_by_default( $open, $post_id ) {
		return false;
	}

	public static function close_pings_by_default( $open, $post_id ) {
		return false;
	}

}