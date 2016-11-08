<?php
/**
 * WP MShots API
 *
 * @package WP-MShots-API
 */

/*
* Plugin Name: WP MShots API
* Plugin URI: https://github.com/wp-api-libraries/wp-mshots-api
* Description: Perform API requests to -MShots in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-mshots-api
* GitHub Branch: master
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check if class exists. */
if ( ! class_exists( 'MShotsAPI' ) ) {

	/**
	 * MShotsAPI class.
	 */
	class MShotsAPI {

		 /**
		 * URL to the API.
		 *
		 * @var string
		 */
		private $base_uri = 'https://s.wordpress.com/mshots/v1/';

		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
		}

		 /**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {

			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}

			$body = wp_remote_retrieve_body( $response );

			return json_decode( $body );

		}

		/**
		 * Get Screenshot
		 *
		 * @access public
		 * @param mixed $url Url.
		 * @param mixed $width Width.
		 * @return void
		 */
		public function get_screenshot( $url, $width ) {

			$request = $this->base_uri . $url . '?w=' . $width;

			return $this->fetch( $request );

		}

	}

}
