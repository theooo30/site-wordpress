<?php
/**
 * Admin settings helper
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Astra Addon
 * @link        https://wpastra.com/
 * @since       Astra 1.0
 */

if ( ! class_exists( 'Astra_Admin_Helper' ) ) {

	/**
	 * Admin Helper
	 */
	// @codingStandardsIgnoreStart
	final class Astra_Admin_Helper {
		// @codingStandardsIgnoreEnd

		/**
		 * Returns an option from the database for
		 * the admin settings page.
		 *
		 * @since 1.0.0
		 * @since 1.5.1 Added $default parameter which can be passed to get_option|get_site_option functions.
		 *
		 * @param  string $key     The option key.
		 * @param  bool   $network Whether to allow the network admin setting to be overridden on subsites.
		 * @param mixed  $default Default value to be passed to get_option|get_site_option functions.
		 * @return string           Return the option value
		 */
		public static function get_admin_settings_option( $key, $network = false, $default = false ) {

			// Get the site-wide option if we're in the network admin.
			if ( $network && is_multisite() ) {
				$value = get_site_option( $key, $default );
			} else {
				$value = get_option( $key, $default );
			}

			return $value;
		}

		/**
		 * Updates an option from the admin settings page.
		 *
		 * @param string $key       The option key.
		 * @param mixed  $value     The value to update.
		 * @param bool   $network   Whether to allow the network admin setting to be overridden on subsites.
		 * @return mixed
		 */
		public static function update_admin_settings_option( $key, $value, $network = false ) {

			// Update the site-wide option since we're in the network admin.
			if ( $network && is_multisite() ) {
				update_site_option( $key, $value );
			} else {
				update_option( $key, $value );
			}
		}

		/**
		 * Returns an option from the database for
		 * the admin settings page.
		 *
		 * @param string $key The option key.
		 * @param bool   $network Whether to allow the network admin setting to be overridden on subsites.
		 * @return mixed
		 */
		public static function delete_admin_settings_option( $key, $network = false ) {

			// Get the site-wide option if we're in the network admin.
			if ( $network && is_multisite() ) {
				$value = delete_site_option( $key );
			} else {
				$value = delete_option( $key );
			}

			return $value;
		}
	}

}
