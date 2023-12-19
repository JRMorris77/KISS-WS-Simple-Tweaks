<?php
/**
 * This file disables author, tag, category, and date archives.
 */

class Kissws_Simple_Tweaks_Disable_Archives {

	public static function init() {
		add_filter( 'rewrite_rules_array', array( __CLASS__, 'disable_author_archives' ), 10, 1 );
		add_filter( 'rewrite_rules_array', array( __CLASS__, 'disable_tag_archives' ), 10, 1 );
		add_filter( 'rewrite_rules_array', array( __CLASS__, 'disable_category_archives' ), 10, 1 );
		add_filter( 'rewrite_rules_array', array( __CLASS__, 'disable_date_archives' ), 10, 1 );
		add_action( 'template_redirect', array( __CLASS__, 'redirect_archived_pages' ) );
	}

	public static function disable_author_archives( $rules ) {
		global $wp_rewrite;
		foreach ( $wp_rewrite->author_base_rules as $rule => $rewrite ) {
			unset( $rules[$rule] );
		}
		return $rules;
	}

	public static function disable_tag_archives( $rules ) {
		global $wp_rewrite;
		foreach ( $wp_rewrite->tag_base_rules as $rule => $rewrite ) {
			unset( $rules[$rule] );
		}
		return $rules;
	}

	public static function disable_category_archives( $rules ) {
		global $wp_rewrite;
		foreach ( $wp_rewrite->category_base_rules as $rule => $rewrite ) {
			unset( $rules[$rule] );
		}
		return $rules;
	}

	public static function disable_date_archives( $rules ) {
		global $wp_rewrite;
		foreach ( $wp_rewrite->date_rewrite_rules as $rule => $rewrite ) {
			unset( $rules[$rule] );
		}
		return $rules;
	}

	public static function redirect_archived_pages() {
		if ( is_author() || is_tag() || is_category() || is_date() ) {
			wp_redirect( home_url(), 301 );
			exit;
		}
	}

}