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

class ShortcodesDates {

	public function __construct( $feature ) {
		if ( \get_option( '_codepile-' . $feature['slug'] ) == 'yes' ) {
			if ( \get_option( '_codepile-current-date' ) == 'yes' ) {
				add_shortcode( 'codepile-date', array( __CLASS__, 'date' ) );
			}
			if ( \get_option( '_codepile-current-year' ) == 'yes' ) {
				add_shortcode( 'codepile-year', array( __CLASS__, 'year' ) );
			}
			if ( \get_option( '_codepile-future-date' ) == 'yes' ) {
				add_shortcode( 'codepile-future', array( __CLASS__, 'future' ) );
			}
		}
	}

	public static function date( $atts ) {
		$atts = shortcode_atts( array(
			'format' => 'Y-m-d'
		), $atts, 'codepile-date' );

		return date( $atts['format'] );
	}

	public static function year( $atts ) {
		return date( 'Y' );
	}

	public static function future( $atts ) {
		$atts = shortcode_atts( array(
			'time'   => 'now',
			'format' => 'Y-m-d H:i:s'
		), $atts, 'codepile-future' );

		return date( $atts['format'], strtotime( $atts['time'] ) );
	}
}