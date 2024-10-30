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

class Icons {

	public function __construct( $feature ) {
		if ( get_option( '_codepile-' . $feature['slug'] ) == 'yes' ) {
			if ( get_option( '_codepile-fontawesome' ) == 'yes' ) {
				wp_enqueue_script( 'codepile-fontawesome', esc_url( 'https://kit.fontawesome.com/' . get_option( '_codepile-fontawesome-kit' ) . '.js' ) );
				add_filter( 'script_loader_tag', array( __CLASS__, 'fontawesome_attributes' ), 10, 3 );
			}
			if ( get_option( '_codepile-forkawesome' ) == 'yes' ) {
				wp_enqueue_style( 'codepile-forkawesome', esc_url( 'https://cdn.jsdelivr.net/npm/fork-awesome@' . get_option( '_codepile-forkawesome-version' ) . '/css/fork-awesome.min.css' ) );
				add_filter( 'style_loader_tag', array( __CLASS__, 'forkawesome_attributes' ), 10, 4 );
			}
			if ( get_option( '_codepile-friconix' ) == 'yes' ) {
				if ( empty( get_option( '_codepile-friconix-version' ) ) ) {
					$src = 'https://friconix.com/cdn/friconix.js';
				} else {
					$src = 'https://friconix.com/cdn/friconix-' . get_option( '_codepile-friconix-version' ) . '.js';
				}
				wp_enqueue_script( 'codepile-friconix', esc_url( $src ) );
				add_filter( 'script_loader_tag', array( __CLASS__, 'friconix_attributes' ), 10, 3 );
			}
		}
	}

	public static function fontawesome_attributes( $tag, $handle, $src ) {
		if ( 'codepile-fontawesome' == $handle ) {
			$tag = '<script src="' . esc_url( $src ) . '" crossorigin="anonymous"></script>';
		}

		return $tag;
	}

	public static function forkawesome_attributes( $html, $handle, $href, $media ) {
		if ( 'codepile-forkawesome' == $handle ) {
			$html = '<link rel="stylesheet" href="' . esc_url( $href ) . '" integrity="' . esc_attr( get_option( '_codepile-forkawesome-hash' ) ) . '" crossorigin="anonymous">';
		}

		return $html;
	}

	public static function friconix_attributes( $tag, $handle, $src ) {
		if ( 'codepile-friconix' == $handle ) {
			$tag = '<script defer src="' . esc_url( $src ) . '"></script>';
		}

		return $tag;
	}
}