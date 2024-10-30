<?php
/*
 * @package       codepile
 * @copyright     (C) Copyright 2022 Ryan Rhode, All rights reserved.
 * @author        Ryan Rhode, ryan@codepile.ca
 * @version       2022.03.18 17:14:51 EDT
 * @license       This program is free software; you can redistribute it and/or modify
 *        it under the terms of the GNU General Public License as published by
 *        the Free Software Foundation; either version 2 of the License, or
 *        (at your option) any later version.
 *
 *        This program is distributed in the hope that it will be useful,
 *        but WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *        GNU General Public License for more details.
 *
 *        You should have received a copy of the GNU General Public License along
 *        with this program;  If not, see http://www.gnu.org/licenses/gpl-2.0.html.
 *
 */

namespace CodePile\Features\Free;

class Memory {
	public function __construct( $feature, $save = false ) {

		if ( ! empty( carbon_get_theme_option( 'codepile-admin-memory-limit' ) ) ) {
			add_filter( 'admin_memory_limit', array( __CLASS__, 'admin_memory_limit' ) );
		}

		if ( ! empty( carbon_get_theme_option( 'codepile-image-memory-limit' ) ) ) {
			add_filter( 'image_memory_limit', array( __CLASS__, 'image_memory_limit' ) );
		}

		if ( $save ) {
			self::convert_line_endings();
			$this->wp_memory_limit();
			$this->wp_max_memory_limit();
		}
	}

	/**
	 * @return bool|mixed|void
	 */
	public static function admin_memory_limit() {
		return get_option( 'admin-memory-limit' );
	}

	/**
	 * Convert wp-config.php line endings from Windows to UNIX or else there will be extra line breaks.
	 */
	public static function convert_line_endings() {
		$wpconfig = file_get_contents( ABSPATH . 'wp-config.php' );
		$wpconfig = str_replace( [ "\r\n", "\r" ], "\n", $wpconfig );
		file_put_contents( ABSPATH . 'wp-config.php', $wpconfig, LOCK_EX );
	}

	/**
	 * @return bool|mixed|void
	 */
	public static function image_memory_limit() {
		return get_option( 'image-memory-limit' );
	}

	public function wp_memory_limit() {
		try {
			$WPConfigTransformer = new \WPConfigTransformer( ABSPATH . 'wp-config.php' );
			$WPConfigTransformer->update( 'constant', 'WP_MEMORY_LIMIT', carbon_get_theme_option( 'codepile-wp-memory-limit' ) );
		} catch ( \Exception $e ) {
			error_log( $e->getMessage() );
		}
	}

	public function wp_max_memory_limit() {
		try {
			$WPConfigTransformer = new \WPConfigTransformer( ABSPATH . 'wp-config.php' );
			$WPConfigTransformer->update( 'constant', 'WP_MAX_MEMORY_LIMIT', carbon_get_theme_option( 'codepile-wp-max-memory-limit' ) );
		} catch ( \Exception $e ) {
			error_log( $e->getMessage() );
		}
	}

}