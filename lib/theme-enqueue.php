<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Theme_Enqueue' ) ) :

	class Theme_Enqueue {
		function __construct() {
		}

		function init() {
			add_action( 'wp_enqueue_scripts', [ $this, 'theme' ], 20 );
		}

		function theme() {
			wp_enqueue_script( 'ReactTheme-js', get_template_directory_uri() . '/build/bundle.js', [], date( 'YmdHis' ), true );
			wp_localize_script( 'ReactTheme-js', 'RT_API', array(
                // Add vars here
				'root'            => esc_url_raw( rest_url() ),
				'nonce'           => wp_create_nonce( 'wp_rest' ),
				'siteName'        => get_bloginfo( 'name' ),
				'siteDescription' => get_bloginfo( 'description' ),
				'categories'      => $this->get_categories_with_links(),
				'current_user'    => wp_get_current_user()
			) );
			wp_enqueue_style( get_stylesheet(), get_template_directory_uri() . '/build/bundle.css' );
		}

		function get_categories_with_links() {
			$categories = get_categories( [ 'hide_empty' => 0 ] );
			foreach ( $categories as $i => $category ) {
				$categories[ $i ]->link = get_category_link( $category->term_id );
			}
			return $categories;
		}
	}

endif;
