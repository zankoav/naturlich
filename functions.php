<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 1/26/18
	 * Time: 9:49 AM
	 */

	require_once 'zanko.php';

	require_once 'base/base.php';
	require_once 'inc/front-page-sections/sections.php';

	require_once 'inc/NaturlithSetup.php';

	require_once 'inc/custom-type-product.php';
	require_once 'inc/product-options.php';

	require_once 'inc/custom-type-contacts.php';
	require_once 'inc/contact-options.php';

	$naturlith = new NaturlithSetup();
	$naturlith->setup();

	function codernote_request( $query_string ) {
		if ( isset( $query_string['page'] ) ) {
			if ( '' != $query_string['page'] ) {
				if ( isset( $query_string['name'] ) ) {
					unset( $query_string['name'] );
				}
			}
		}

		return $query_string;
	}

	add_filter( 'request', 'codernote_request' );


	add_action( 'pre_get_posts', 'codernote_pre_get_posts' );
	function codernote_pre_get_posts( $query ) {
		if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() ) {
			$query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
		}
	}



